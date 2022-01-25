<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:13
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

abstract class BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway/InterfaceII';
    /**
     * @var string 交易编码
     */
    protected $txCode;
    /**
     * @var string 机构编号
     */
    protected $institutionId;
    /**
     * @var string 请求报文明文
     */
    protected $requestPlainText;
    /**
     * @var string 请求报文字节数
     */
    protected $requestMessage;
    /**
     * @var string 请求报文signature
     */
    protected $requestSignature;

    /**
     * @return string
     */
    public function getTxCode(): string
    {
        return $this->txCode;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getRequestPlainText(): string
    {
        return $this->requestPlainText;
    }


    /**
     * @return string
     */
    public function getRequestMessage(): string
    {
        return $this->requestMessage;
    }

    /**
     * @param string $requestMessage
     */
    public function setRequestMessage(string $requestMessage): void
    {
        $this->requestMessage = $requestMessage;
    }

    /**
     * @return string
     */
    public function getRequestSignature(): string
    {
        return $this->requestSignature;
    }

    /**
     * @param string $requestSignature
     */
    public function setRequestSignature(string $requestSignature): void
    {
        $this->requestSignature = $requestSignature;
    }
}