<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx5018Notify extends TBaseNotify
{
    /**
     * @var string 订单号
     */
    protected $orderNo;
    /**
     * @var int 支付金额，单位： 分
     */
    protected $amount;
    /**
     * @var int 可用分账金额，单位：分
     */
    protected $availableSplitAmount;
    /**
     * @var int 支付状态:
     * 10=未支付
     * 20=支付处理中
     * 30=支付成功
     * 40=支付失败
     * 50=订单关闭
     */
    protected $status;
    /**
     * @var string 支付方式:
     */
    protected $paymentWay;
    /**
     * @var string 支付回单流水号
     */
    protected $bankTraceNo;
    /**
     * @var string 平台订单号
     * PaymentWay=80 时 为跳转支付平台订单号
     */
    protected $traceNo;
    /**
     * @var string 收款用户 id
     */
    protected $payeeUserId;
    /**
     * @var string 收款人账号
     */
    protected $payeeAccountNumber;
    /**
     * @var string 付款用户 ID
     */
    protected $payerId;
    /**
     * @var string 银行处理时间
     */
    protected $responseTime;
    /**
     * @var int 收款用户手续费总金额,单位:分
     */
    protected $payeeUserFee;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->traceNo = ArrayUtil::get('TraceNo', $this->noticeBody);
        $this->orderNo = ArrayUtil::get('OrderNo', $this->noticeBody);
        $this->amount = intval(ArrayUtil::get('Amount', $this->noticeBody));
        $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->noticeBody));
        $this->bankTraceNo = ArrayUtil::get('BankTraceNo', $this->noticeBody);
        $this->paymentWay = ArrayUtil::get('PaymentWay', $this->noticeBody);
        $this->payeeUserId = ArrayUtil::get('PayeeUserID', $this->noticeBody);
        $this->payerId = ArrayUtil::get('PayerID', $this->noticeBody);
        $this->responseTime = ArrayUtil::get('ResponseTime', $this->noticeBody);
        $this->payeeUserFee = intval(ArrayUtil::get('PayeeUserFee', $this->noticeBody));
    }

    /**
     * @return string
     */
    public function getOrderNo(): string
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
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPaymentWay(): string
    {
        return $this->paymentWay;
    }

    /**
     * @return string
     */
    public function getBankTraceNo(): ?string
    {
        return $this->bankTraceNo;
    }

    /**
     * @return string
     */
    public function getTraceNo(): ?string
    {
        return $this->traceNo;
    }

    /**
     * @return int
     */
    public function getAvailableSplitAmount(): int
    {
        return $this->availableSplitAmount;
    }

    /**
     * @return string
     */
    public function getPayeeUserId(): string
    {
        return $this->payeeUserId;
    }

    /**
     * @return string
     */
    public function getPayeeAccountNumber(): string
    {
        return $this->payeeAccountNumber;
    }

    /**
     * @return string
     */
    public function getPayerId(): string
    {
        return $this->payerId;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
    {
        return $this->responseTime;
    }

    /**
     * @return int
     */
    public function getPayeeUserFee(): int
    {
        return $this->payeeUserFee;
    }
}