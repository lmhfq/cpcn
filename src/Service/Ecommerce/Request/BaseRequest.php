<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:13
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\SignatureFactory;

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
     * @var int 1表示证书使用的国密证书，2为国际证书
     */
    protected $certificate = 2;
    /**
     * @var string 交易流水号 流水号前17位必须是时间戳 yyyyMMddHHmmssSSS，数字
     */
    protected $txSn;
    /**
     * @var string
     * 用户 ID 上送规则：数字/字母/数字+字母
     */
    protected $userId;

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
    public function getInstitutionId(): ?string
    {
        return $this->institutionId;
    }

    /**
     * @param string $institutionId
     */
    public function setInstitutionId(string $institutionId): void
    {
        $this->institutionId = $institutionId;
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
     * @return int
     */
    public function getCertificate(): int
    {
        return $this->certificate;
    }

    /**
     * @param int $certificate
     */
    public function setCertificate(int $certificate): void
    {
        $this->certificate = $certificate;
    }

    /**
     * @return string
     */
    public function getTxSn(): string
    {
        return $this->txSn ?: '';
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
    public function getUserId(): string
    {
        return $this->userId ?: '';
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public abstract function handle();

    /**
     * @return array[]
     */
    protected function getHead(): array
    {
        return [
            'Head' => [
                'TxCode' => $this->getTxCode()
            ],
        ];
    }

    /**
     * @throws InvalidConfigException
     * @author lmh
     */
    protected function process()
    {
        $this->requestMessage = base64_encode(trim($this->requestPlainText));
        $this->requestSignature = SignatureFactory::getSigner()->sign(trim($this->requestPlainText));
    }
}