<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Service\Ep\Notify\BaseNotify;
use Lmh\Cpcn\Service\Ep\Request\BaseRequest;
use Lmh\Cpcn\Service\Ep\Response\BaseResponse;
use Lmh\Cpcn\Support\RSASigner;
use Lmh\Cpcn\Support\ServiceContainer;
use Lmh\Cpcn\Support\SignatureFactory;
use Psr\Log\LoggerInterface;

class Application extends ServiceContainer
{
    /**
     * 执行请求
     * @param BaseRequest $request
     * @param BaseResponse $response
     * @return BaseResponse
     * @throws GuzzleException
     * @throws InvalidConfigException
     * @author lmh
     */
    public function execute(BaseRequest $request, BaseResponse $response): BaseResponse
    {
        if (!$request->getInstitutionId()) {
            $request->setInstitutionId($this->offsetGet("config")['institutionId']);
        }
        SignatureFactory::setSigner(new RSASigner(
            $this->offsetGet("config")['keystoreFilename'],
            $this->offsetGet("config")['keystorePassword'],
            $this->offsetGet("config")['keyContent'],
            $this->offsetGet("config")['certificateFilename'],
            $this->offsetGet("config")['certContent'],
            $this->offsetGet("config")['signerType']
        ));
        $request->handle();
        /**
         * @var LoggerInterface $logger
         */
        $logger = $this->offsetGet("config")['logger'] ?? $this->offsetGet("logger");
        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
            if ($request->getTxCode() != '4600' && $request->getTxCode() != '2902') {
                $logger->debug("请求原文：" . $request->getRequestPlainText());
            }
        }

        $result = $this->request($request);
        $response->handle($result);
        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
            $logger->debug("响应原文：" . $response->getResponsePlainText());
        }
        return $response;
    }


    /**
     * @param BaseRequest $request
     * @return string
     * @throws GuzzleException
     * @author lmh
     */
    private function request(BaseRequest $request): string
    {
        $client = new Client($this->offsetGet("config")['http']);
        $params = [
            'message' => $request->getRequestMessage(),
            'signature' => $request->getRequestSignature(),
        ];
        $options = [
            'headers' => [
                'Accept' => 'text/xml; charset=UTF8',
            ],
            'form_params' => $params,
            'verify' => false
        ];
        $response = $client->request('POST', $request->getUri(), $options);
        return $response->getBody()->getContents();
    }

    /**
     * 处理回调信息
     * @param string $message
     * @param string $signature
     * @param BaseNotify $baseNotify
     * @return BaseNotify
     * @author lmh
     */
    public function notify(string $message, string $signature, BaseNotify $baseNotify): BaseNotify
    {
        SignatureFactory::setSigner(new RSASigner(
            $this->offsetGet("config")['keystoreFilename'],
            $this->offsetGet("config")['keystorePassword'],
            $this->offsetGet("config")['keyContent'],
            $this->offsetGet("config")['certificateFilename'],
            $this->offsetGet("config")['certContent']
        ));
        $baseNotify->handle($message, $signature);

        $logger = $this->offsetGet("logger");
        if ($this->offsetGet("config")['debug']) {
            $logger->debug("回调原文", [$baseNotify->getNoticePlainText()]);
        }
        return $baseNotify;
    }
}