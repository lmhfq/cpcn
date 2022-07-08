<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5016Response extends BaseResponse
{
    /**
     * @var string
     */
    protected $orderNo;
    /**
     * @var int 支付金额，单位： 分
     */
    protected $amount;
    /**
     * @var int 可用分账金额，单 位：分
     */
    protected $availableSplitAmount;
    /**
     * @var integer 可用撤销金额，单 位：分
     * 可撤销金额为支付 金额进去已分账金 额
     */
    protected $availableCancelAmount;
    /**
     * @var int 支付状态: 10=未支付 20=支付处理中 30=支付成功 40=支付失败 50=订单关闭
     */
    protected $status;
    /**
     * @var string 支付回单流水号
     */
    protected $bankTraceNo;
    /**
     * @var string
     */
    protected $paymentWay;
    /**
     * @var string
     */
    protected $qRPaymentType;
    /**
     * @var string
     */
    protected $payerId;
    /**
     * @var string  付款人实际支付金额，单位：分 （使用优惠时，该金额为付款人际支付金额；其他情况为0）
     */
    protected $payAmount;
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
    public function getAvailableSplitAmount(): int
    {
        return $this->availableSplitAmount;
    }

    /**
     * @param int $availableSplitAmount
     */
    public function setAvailableSplitAmount(int $availableSplitAmount): void
    {
        $this->availableSplitAmount = $availableSplitAmount;
    }

    /**
     * @return int
     */
    public function getAvailableCancelAmount(): int
    {
        return $this->availableCancelAmount;
    }

    /**
     * @param int $availableCancelAmount
     */
    public function setAvailableCancelAmount(int $availableCancelAmount): void
    {
        $this->availableCancelAmount = $availableCancelAmount;
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
    public function getPaymentWay(): string
    {
        return $this->paymentWay;
    }

    /**
     * @param string $paymentWay
     */
    public function setPaymentWay(string $paymentWay): void
    {
        $this->paymentWay = $paymentWay;
    }

    /**
     * @return string
     */
    public function getQRPaymentType(): string
    {
        return $this->qRPaymentType;
    }

    /**
     * @param string $qRPaymentType
     */
    public function setQRPaymentType(string $qRPaymentType): void
    {
        $this->qRPaymentType = $qRPaymentType;
    }

    /**
     * @return string
     */
    public function getPayerId(): string
    {
        return $this->payerId;
    }

    /**
     * @param string $payerId
     */
    public function setPayerId(string $payerId): void
    {
        $this->payerId = $payerId;
    }

    /**
     * @return string
     */
    public function getPayAmount(): string
    {
        return $this->payAmount;
    }

    /**
     * @return string
     */
    public function getBankTraceNo(): string
    {
        return $this->bankTraceNo;
    }

    /**
     * @param string $bankTraceNo
     */
    public function setBankTraceNo(string $bankTraceNo): void
    {
        $this->bankTraceNo = $bankTraceNo;
    }

    /**
     * @param string $payAmount
     */
    public function setPayAmount(string $payAmount): void
    {
        $this->payAmount = $payAmount;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
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

    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->bankTraceNo = ArrayUtil::get('BankTraceNo', $this->responseBody);
            $this->orderNo = ArrayUtil::get('OrderNo', $this->responseBody);
            $this->payAmount = ArrayUtil::get('PayAmount', $this->responseBody);
            $this->amount = intval(ArrayUtil::get('Amount', $this->responseBody));
            $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->responseBody));
            $this->availableCancelAmount = intval(ArrayUtil::get('AvailableCancelAmount', $this->responseBody));
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
        }
    }

}