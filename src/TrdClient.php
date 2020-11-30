<?php
declare(strict_types=1);


namespace Lmh\Cpcn;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lmh\Cpcn\Notify\NtcBaseRequest;
use Lmh\Cpcn\Request\TrdBaseRequest;
use Lmh\Cpcn\Response\TrdBaseResponse;
use Lmh\Cpcn\Support\PriKeySigner;
use Lmh\Cpcn\Support\ServiceContainer;
use Lmh\Cpcn\Support\SignatureFactory;
use Psr\Log\LoggerInterface;


class TrdClient extends ServiceContainer
{
    /**
     * @param TrdBaseRequest $request
     * @param TrdBaseResponse $response
     * @return TrdBaseResponse
     * @throws GuzzleException
     */
    public function execute(TrdBaseRequest $request, TrdBaseResponse $response): TrdBaseResponse
    {
        if (!$request->getMsghdPtncd()) {
            $request->setMsghdPtncd($this->offsetGet("config")['ptnCode']);
        }
        if (!$request->getMsghdBkcd()) {
            $request->setMsghdBkcd($this->offsetGet("config")['bkCode']);
        }
        SignatureFactory::setSigner(new PriKeySigner(
            $this->offsetGet("config")['keystoreFilename'],
            $this->offsetGet("config")['keystorePassword'],
            $this->offsetGet("config")['keyContent'],
            $this->offsetGet("config")['certificateFilename'],
            $this->offsetGet("config")['certContent']
        ));
        $request->handle();
        /**
         * @var LoggerInterface $logger
         */
        $logger = $this->offsetGet("logger");
        if ($this->offsetGet("config")['debug']) {
            $logger->debug("请求原文", [$request->getRequestPlainText()]);
        }
        $params = [
            'message' => $request->getRequestMessage(),
            'signature' => $request->getRequestSignature(),
            'trdcode' => $request->getMsghdTrcd(),
            'ptncode' => $request->getMsghdPtncd(),
        ];
        $resultMessage = $this->request($params);
        $response->handle($resultMessage);
        if ($this->offsetGet("config")['debug']) {
            $logger->debug("响应原文", [$response->getResponsePlainText()]);
        }
        return $response;
    }


    /**
     * @param array $data
     * @return string
     * @throws GuzzleException
     */
    private function request(array $data)
    {
        $client = new Client($this->offsetGet("config")['http']);
        $options = [
            'headers' => [
                'Accept' => 'text/xml; charset=UTF8',
            ],
            'form_params' => $data,
        ];
        $response = $client->request('POST', '', $options);
        return $response->getBody()->getContents();
    }

    /**
     * 处理回调
     * @param string $message
     * @param string $signature
     * @param NtcBaseRequest $noticeRequest
     * @return NtcBaseRequest
     */
    public function notify(string $message, string $signature, NtcBaseRequest $noticeRequest): NtcBaseRequest
    {
        SignatureFactory::setSigner(new PriKeySigner(
            $this->offsetGet("config")['keystoreFilename'],
            $this->offsetGet("config")['keystorePassword'],
            $this->offsetGet("config")['keyContent'],
            $this->offsetGet("config")['certificateFilename'],
            $this->offsetGet("config")['certContent']
        ));
        $noticeRequest->handle($message, $signature);

        $logger = $this->offsetGet("logger");
        if ($this->offsetGet("config")['debug']) {
            $logger->debug("回调原文", [$noticeRequest->getPlainText()]);
        }
        return $noticeRequest;
    }
}