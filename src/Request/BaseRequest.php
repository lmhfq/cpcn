<?php
declare(strict_types=1);


namespace Cpcn\Request;

/**
 * Class BaseRequest
 * @package Cpcn\Request
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 */
abstract class BaseRequest
{
    /**
     * @var string 合作方编号
     */
    protected $msghd_ptncd;
    /**
     * @var string 交易码
     */
    protected $msghd_trcd;
    protected $requestPlainText;
    protected $requestMessage;
    protected $requestSignature;

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
    public function setRequestPlainText($requestPlainText)
    {
        $this->requestPlainText = $requestPlainText;
    }

    /**
     * @return mixed
     */
    public function getRequestMessage()
    {
        return $this->requestMessage;
    }

    /**
     * @param mixed $requestMessage
     */
    public function setRequestMessage($requestMessage)
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
    public function setRequestSignature($requestSignature)
    {
        $this->requestSignature = $requestSignature;
    }


}