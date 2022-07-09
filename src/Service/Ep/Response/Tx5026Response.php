<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5026Response extends BaseResponse
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

    /**
     * @return string
     */
    public function getOrderNo(): string
    {
        return $this->orderNo;
    }

    /**
     * @param string $orderNo
     */
    public function setOrderNo(string $orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getCancelAmount(): int
    {
        return $this->cancelAmount;
    }

    /**
     * @param int $cancelAmount
     */
    public function setCancelAmount(int $cancelAmount): void
    {
        $this->cancelAmount = $cancelAmount;
    }

    /**
     * @return string
     */
    public function getRefundTraceNo(): ?string
    {
        return $this->refundTraceNo;
    }

    /**
     * @param string $refundTraceNo
     */
    public function setRefundTraceNo(string $refundTraceNo): void
    {
        $this->refundTraceNo = $refundTraceNo;
    }

    /**
     * @return int
     */
    public function getReturnPayeeUserFee(): int
    {
        return $this->returnPayeeUserFee;
    }

    /**
     * @param int $returnPayeeUserFee
     */
    public function setReturnPayeeUserFee(int $returnPayeeUserFee): void
    {
        $this->returnPayeeUserFee = $returnPayeeUserFee;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getResponseTime(): ?string
    {
        return $this->responseTime;
    }

    /**
     * @param string $responseTime
     */
    public function setResponseTime(string $responseTime): void
    {
        $this->responseTime = $responseTime;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->refundTraceNo = ArrayUtil::get('RefundTraceNo', $this->responseBody);
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
            $this->orderNo = ArrayUtil::get('OrderNo', $this->responseBody);
            $this->returnPayeeUserFee = intval(ArrayUtil::get('returnPayeeUserFee', $this->responseBody));
            $this->amount = intval(ArrayUtil::get('Amount', $this->responseBody));
            $this->cancelAmount = intval(ArrayUtil::get('CancelAmount', $this->responseBody));
        }
    }
}