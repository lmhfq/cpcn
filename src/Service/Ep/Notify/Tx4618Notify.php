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
     * 18=被动已打款待验证
     * 30=成功
     */
    protected $status;
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
}