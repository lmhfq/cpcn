<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:29
 */

namespace Lmh\Cpcn\Service\Ecommerce\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4601Response extends BaseResponse
{
    /**
     * @var string 机构编号
     */
    protected $institutionId;
    /**
     * @var string 响应码
     */
    protected $responseCode;
    /**
     * @var string 响应信息
     */
    protected $responseMessage;
    /**
     * @var string
     */
    protected $userId;
    /**
     * @var int 状态:
     * 10=受理成功
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $status;
    /**
     * @var string
     */
    protected $dBank;
    /**
     * @var int 绑卡状态:
     * 10=已受理
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $bindingStatus;

    /**
     * @return string
     */
    public function getInstitutionId(): string
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
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDBank(): string
    {
        return $this->dBank;
    }

    /**
     * @param string $dBank
     */
    public function setDBank(string $dBank): void
    {
        $this->dBank = $dBank;
    }

    /**
     * @return int
     */
    public function getBindingStatus(): int
    {
        return $this->bindingStatus;
    }

    /**
     * @param int $bindingStatus
     */
    public function setBindingStatus(int $bindingStatus): void
    {
        $this->bindingStatus = $bindingStatus;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        $this->responseMessage = $message;
        parent::process();
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->userId = ArrayUtil::get('UserID', $this->responseBody);
            $this->status = ArrayUtil::get('Status', $this->responseBody);
        }
    }
}