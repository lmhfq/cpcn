<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午2:58
 */

namespace Lmh\Cpcn\Service\Ecommerce;

use Lmh\Cpcn\Service\Ecommerce\Request\BaseRequest;
use Lmh\Cpcn\Service\Ecommerce\Response\BaseResponse;
use Lmh\Cpcn\Support\ServiceContainer;

class Application extends ServiceContainer
{

    /**
     * 执行请求
     * @param BaseRequest $request
     * @param BaseResponse $response
     * @return BaseResponse
     * @author lmh
     */
    public function execute(BaseRequest $request, BaseResponse $response): BaseResponse
    {

        var_dump($this->offsetGet("config"));
//        if (!$request->getMerchantId()) {
//            $request->setMerchantId($this->offsetGet("config")['merchantId']);
//        }
//        SignatureFactory::setSigner(new RSASigner(
//            $this->offsetGet("config")['keystoreFilename'],
//            $this->offsetGet("config")['keystorePassword'],
//            $this->offsetGet("config")['keyContent'],
//            $this->offsetGet("config")['certificateFilename'],
//            $this->offsetGet("config")['certContent'],
//            $this->offsetGet("config")['platformCertContent']
//        ));
//        $request->handle();
//        /**
//         * @var LoggerInterface $logger
//         */
//        $logger = $this->offsetGet("config")['logger'] ?? null;
//        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
//            $logger->debug("请求原文：" . $request->getRequestPlainText());
//        }
//
//        $params = [
//            'data' => $request->getRequestMessage(),
//            'uri' => $request->getTradeUri()
//        ];
//        $result = $this->request($params);
//        $response->handle($result);
//        if ($logger instanceof LoggerInterface && $this->offsetGet("config")['debug']) {
//            $logger->debug("响应原文：" . $response->getResponsePlainText());
//        }
        return $response;
    }
}