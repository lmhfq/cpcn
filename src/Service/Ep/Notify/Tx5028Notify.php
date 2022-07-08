<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx5028Notify extends TBaseNotify
{
    /**
     * @var string 订单号
     */
    protected $orderNo;
    /**
     * @var int 退款金额
     */
    protected $amount;
    /**
     * @var int 撤销金额
     */
    protected $cancelAmount;
    /**
     * @var string 退款回单流水号
     */
    protected $refundTraceNo;
    /**
     * @var int 返还收款用户手续费总金额,单位：分
     */
    protected $returnPayeeUserFee;
    /**
     * @var int 退款状态
     * 20=退款成功
     * 30=退款失败
     * 40=退票
     */
    protected $status;
    /**
     * @var string
     */
    protected $responseTime;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->refundTraceNo = ArrayUtil::get('RefundTraceNo', $this->noticeBody);
        $this->responseTime = ArrayUtil::get('ResponseTime', $this->noticeBody);
        $this->orderNo = ArrayUtil::get('OrderNo', $this->noticeBody);
        $this->returnPayeeUserFee = intval(ArrayUtil::get('returnPayeeUserFee', $this->noticeBody));
        $this->amount = intval(ArrayUtil::get('Amount', $this->noticeBody));
        $this->cancelAmount = intval(ArrayUtil::get('CancelAmount', $this->noticeBody));
    }

    /**
     * @return string
     */
    public function getOrderNo(): ?string
    {
        return $this->orderNo;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getCancelAmount(): int
    {
        return $this->cancelAmount;
    }

    /**
     * @return string
     */
    public function getRefundTraceNo(): ?string
    {
        return $this->refundTraceNo;
    }

    /**
     * @return int
     */
    public function getReturnPayeeUserFee(): int
    {
        return $this->returnPayeeUserFee;
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
    public function getResponseTime(): string
    {
        return $this->responseTime;
    }
}