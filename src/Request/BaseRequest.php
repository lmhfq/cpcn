<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;

/**
 * Class BaseRequest
 * @package Cpcn\Request
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 */
abstract class BaseRequest
{
    protected $uri = '/acswk/interfaceII.htm';
    /**
     * @var string 合作方编号
     */
    protected $msghd_ptncd;
    /**
     * @var string 交易码
     */
    protected $msghd_trcd;
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
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getMsghdPtncd()
    {
        return $this->msghd_ptncd;
    }

    /**
     * @param mixed $msghd_ptncd
     */
    public function setMsghdPtncd($msghd_ptncd)
    {
        $this->msghd_ptncd = $msghd_ptncd;
    }

    /**
     * @return mixed
     */
    public function getMsghdTrcd()
    {
        return $this->msghd_trcd;
    }

    /**
     * @return mixed
     */
    public function getRequestPlainText()
    {
        return $this->requestPlainText;
    }

    /**
     * @param mixed $requestPlainText
     */
    protected function setRequestPlainText($requestPlainText)
    {
        $this->requestPlainText = $requestPlainText;
    }

    /**
     * @return string
     */
    public function getRequestMessage(): string
    {
        return $this->requestMessage;
    }

    /**
     * @param mixed $requestMessage
     */
    protected function setRequestMessage($requestMessage)
    {
        $this->requestMessage = $requestMessage;
    }

    /**
     * @return mixed
     */
    public function getRequestSignature()
    {
        return $this->requestSignature;
    }

    /**
     * @param mixed $requestSignature
     */
    protected function setRequestSignature($requestSignature)
    {
        $this->requestSignature = $requestSignature;
    }
}