<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx4618Notify extends TBaseNotify
{
    /**
     * @var string
     */
    protected $sourceTxCode;
    /**
     * @var string
     */
    protected $sourceTxSn;
    /**
     * @var int
     */
    protected $userType;
    /**
     * @var string
     */
    protected $parentUserId;
    /**
     * @var int 状态:
     * 开户交易包含如下状态：
     * 28=待账户验证 30=成功 40=失败
     * 绑卡交易包含如下状态：
     * 18=被动已打款待验证 30=成功 40=失败
     */
    protected $status;
    /**
     * @var int|null 绑卡状态:20=处理中 30=成功 40=失败
     * 交易类型为 4601-开户时， 业务类型为开户绑卡时出现且非空；
     */
    protected $bindingStatus;
    /**
     * @var string 驳回的影印件类型，以";"英文分号分隔
     */
    protected $rejectImageType;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->userType = intval(ArrayUtil::get('UserType', $this->noticeBody));
        $this->sourceTxCode = ArrayUtil::get('SourceTxCode', $this->noticeBody);
        $this->sourceTxSn = ArrayUtil::get('SourceTxSN', $this->noticeBody);
        $this->bindingStatus = ArrayUtil::get('BindingStatus', $this->noticeBody, null);
        if ($this->bindingStatus) {
            $this->bindingStatus = intval($this->bindingStatus);
        }
    }

    /**
     * @return string
     */
    public function getSourceTxCode(): ?string
    {
        return $this->sourceTxCode;
    }

    /**
     * @return string
     */
    public function getSourceTxSn(): string
    {
        return $this->sourceTxSn;
    }

    /**
     * @return int
     */
    public function getUserType(): int
    {
        return $this->userType;
    }

    /**
     * @return string
     */
    public function getParentUserId(): string
    {
        return $this->parentUserId;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getRejectImageType(): string
    {
        return $this->rejectImageType;
    }

    /**
     * @return int|null
     */
    public function getBindingStatus(): ?int
    {
        return $this->bindingStatus;
    }

    /**
     * @param int|null $bindingStatus
     */
    public function setBindingStatus(?int $bindingStatus): void
    {
        $this->bindingStatus = $bindingStatus;
    }


}