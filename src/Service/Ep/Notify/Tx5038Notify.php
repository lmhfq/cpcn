<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx5038Notify extends TBaseNotify
{

    /**
     * @var string 原支付交易流水号
     */
    protected $paymentTxSn;
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var int
     */
    protected $availableSplitAmount;
    /**
     * @var int 分账状态:
     * 10=处理中
     * 20=成功
     * 30=失败
     */
    protected $status;
    /**
     * @var int 收款用户手续费
     * 总金额，单位：分
     */
    protected $sumPayeeFee;
    /**
     * @var string  分账成功时间
     */
    protected $responseTime;
    /**
     * @var array
     */
    protected $splitItems;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->amount = intval(ArrayUtil::get('Amount', $this->noticeBody));
        $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->noticeBody));
        $this->paymentTxSn = ArrayUtil::get('PaymentTxSN', $this->noticeBody);
        $splitItems = ArrayUtil::get('SplitItems', $this->noticeBody, []);
        if (!isset($splitItems[0])) {
            $splitItems = [$splitItems];
        }
        foreach ($splitItems as $v) {
            $this->splitItems[] = $v;
        }
    }

    /**
     * @return string
     */
    public function getPaymentTxSn(): ?string
    {
        return $this->paymentTxSn;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getAvailableSplitAmount(): int
    {
        return $this->availableSplitAmount;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getSumPayeeFee(): int
    {
        return $this->sumPayeeFee;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
    {
        return $this->responseTime;
    }

    /**
     * @return array
     */
    public function getSplitItems(): array
    {
        return $this->splitItems;
    }
}