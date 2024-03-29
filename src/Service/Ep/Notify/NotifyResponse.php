<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\Xml;

class NotifyResponse
{
    /**
     * @var string 返回码
     */
    protected $responseCode = TxResponseCode::SUCCESS;
    /**
     * @var string 返回信息
     */
    protected $responseMessage = 'OK';
    /**
     * @var string
     */
    protected $message;

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
     * @author lmh
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, self::getHead());
        $xml = Xml::build($data, 'Response', '', 'UTF-8');
        $this->message = base64_encode(trim($xml));
    }

    /**
     * @return array[]
     */
    protected function getHead(): array
    {
        return [
            'Head' => [
                'Code' => $this->getResponseCode(),
                'Message' => $this->getResponseMessage(),
            ],
        ];
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
}