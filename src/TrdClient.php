<?php
declare(strict_types=1);


namespace Lmh\Cpcn;


use Lmh\Cpcn\Request\TrdBaseRequest;
use Lmh\Cpcn\Response\TrdBaseResponse;
use Lmh\Cpcn\Support\PriKeySigner;
use Lmh\Cpcn\Support\ServiceContainer;
use Lmh\Cpcn\Support\SignatureFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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
        $request->setMsghdPtncd($this->offsetGet("config")['ptnCode']);
        $request->setMsghdBkcd($this->offsetGet("config")['ptnCode']);
        SignatureFactory::setSigner(new PriKeySigner($this->offsetGet("config")['keystoreFilename']));
        $request->handle();
        $params = [
            'message' => $request->getRequestMessage(),
            'signature' => $request->getRequestSignature(),
            'trdcode' => $request->getMsghdTrcd(),
            'ptncode' => $request->getMsghdPtncd(),
        ];
        /**
         * @var LoggerInterface $logger
         */
        $logger = $this->offsetGet("logger");
        $logger->debug("请求原文", [$request->getRequestPlainText()]);
        $resultMessage = $this->request($params);
        $response->handle($resultMessage);
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
}