<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:13
 */

namespace Lmh\Cpcn\Service\Ep\Response;

use Lmh\Cpcn\Support\ArrayTrait;
use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\Xml;

class BaseResponse
{
    use ArrayTrait;

    /**
     * @var string 返回码
     */
    protected $code;
    /**
     * @var string 返回信息
     */
    protected $message;
    /**
     * @var string 响应码
     */
    protected $responseCode;
    /**
     * @var string 响应信息
     */
    protected $responseMessage;


    /**
     * @var array
     */
    protected $responseData = [];
    /**
     * @var string 响应报文
     */
    protected $responsePlainText;
    /**
     * @var string 交易流水号 流水号前17位必须是时间戳 yyyyMMddHHmmssSSS，数字
     */
    protected $txSn;
    /**
     * @var array
     */
    protected $responseBody = [];

    /**
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }

    /**
     * @return string
     */
    public function getResponsePlainText(): string
    {
        return $this->responsePlainText;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTxSn(): string
    {
        return $this->txSn;
    }

    /**
     * @param string $txSn
     */
    public function setTxSn(string $txSn): void
    {
        $this->txSn = $txSn;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     */
    public function setResponseCode(string $responseCode): void
    {
        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }

    /**
     * @param string $responseMessage
     */
    public function setResponseMessage(string $responseMessage): void
    {
        $this->responseMessage = $responseMessage;
    }


    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        $messageData = explode(",", $message);
        $this->responsePlainText = trim(base64_decode($messageData[0]));
        $this->responseData = Xml::parse($this->responsePlainText);

        $head = ArrayUtil::get('Head', $this->responseData, []);
        $this->responseBody = ArrayUtil::get('Body', $this->responseData, []);

        $this->code = ArrayUtil::get('Code', $head);
        $this->message = ArrayUtil::get('Message', $head);
        $this->txSn = ArrayUtil::get('TxSN', $this->responseBody);

        $this->responseCode = ArrayUtil::get('ResponseCode', $this->responseBody);
        $this->responseMessage = ArrayUtil::get('ResponseMessage', $this->responseBody);
    }
}