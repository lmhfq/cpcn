<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/15
 * Time: 上午11:11
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\Xml;

class NotifyResponse
{
    /**
     * @var string 返回码
     */
    protected $code = TxResponseCode::SUCCESS;
    /**
     * @var string 返回信息
     */
    protected $message = '处理成功';

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
     * @return array[]
     */
    protected function getHead(): array
    {
        return [
            'Head' => [
                'Code' => $this->getCode(),
                'Message' => $this->getMessage(),
            ],
        ];
    }


    /**
     * @return string
     * @author lmh
     */
    public function handle(): string
    {
        $data = [];
        $data = array_merge($data, self::getHead());
        $xml = Xml::build($data, 'Response', '', 'UTF-8');
        return base64_encode(trim($xml));
    }
}