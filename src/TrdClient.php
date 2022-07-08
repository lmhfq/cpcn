<?php
declare(strict_types=1);


namespace Lmh\Cpcn;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lmh\Cpcn\Service\Acs\Notify\NtcBaseRequest;
use Lmh\Cpcn\Service\Acs\Request\TrdBaseRequest;
use Lmh\Cpcn\Service\Acs\Response\TrdBaseResponse;
use Lmh\Cpcn\Support\RSASigner;
use Lmh\Cpcn\Support\ServiceContainer;
use Lmh\Cpcn\Support\SignatureFactory;
use Psr\Log\LoggerInterface;

/**
 * Class TrdClient
 * @package Lmh\Cpcn
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * @deprecated 2.0版本废弃，2.0之后移除该类，请使用Factory工厂类
 */
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
        SignatureFactory::setSigner(new RSASigner(
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
        $logger = $this->offsetGet("config")['logger'] ?? $this->offsetGet("logger");
        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
            $logger->debug("请求原文：" . $request->getRequestPlainText());
        }
        $params = [
            'message' => $request->getRequestMessage(),
            'signature' => $request->getRequestSignature(),
            'trdcode' => $request->getMsghdTrcd(),
            'ptncode' => $request->getMsghdPtncd(),
        ];
        $result = $this->request($params);
        $response->handle($result);
        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
            $logger->debug("响应原文：" . $response->getResponsePlainText());
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
            'verify' => false
        ];
        $response = $client->request('POST', '/acswk/interfaceII.htm', $options);
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
        SignatureFactory::setSigner(new RSASigner(
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