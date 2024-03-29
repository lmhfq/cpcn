<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4601Response extends BaseResponse
{
    /**
     * @var int 状态:
     * 10=受理成功 20=处理中 28=待账户验证 29=审核中 30=成功 40=失败
     * (开户并打款绑卡时会返回 28,29 状态)
     */
    protected $status;
    /**
     * @var array
     */
    protected $dBank;
    /**
     * @var int|null 绑卡状态:10=已受理 20=处理中 30=成功 40=失败
     * 开户并绑卡时出现且非空
     */
    protected $bindingStatus;

    /**
     * @return int
     */
    public function getStatus(): int
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
     * @return array
     */
    public function getDBank(): ?array
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
    public function getBindingStatus(): ?int
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
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->userId = ArrayUtil::get('UserID', $this->responseBody);
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->bindingStatus = ArrayUtil::get('BindingStatus', $this->responseBody, null);
            if ($this->bindingStatus) {
                $this->bindingStatus = intval($this->bindingStatus);
            }
            $this->dBank = ArrayUtil::get('DBank', $this->responseBody, []);
        }
    }
}