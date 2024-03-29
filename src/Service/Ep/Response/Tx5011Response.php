<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5011Response extends BaseResponse
{
    /**
     * @var string 授权码
     */
    protected $qRAuthCode;
    /**
     * @var string
     */
    protected $orderNo;
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var int 可用分账金额，单 位：分
     */
    protected $availableSplitAmount;
    /**
     * @var int 可用撤销金额，单 位：分 可撤销金额为支付金 额进去已分账金额
     */
    protected $availableCancelAmount;
    /**
     * @var int 10=未支付 20=支付处理中 30=支付成功 40=支付失败 50=订单关闭
     */
    protected $status;
    /**
     * @var string 支付回单流水号
     */
    protected $bankTraceNo;
    /**
     * @var string
     */
    protected $payAmount;

    /**
     * @return string
     */
    public function getQRAuthCode(): ?string
    {
        return $this->qRAuthCode;
    }

    /**
     * @param string $qRAuthCode
     */
    public function setQRAuthCode(string $qRAuthCode): void
    {
        $this->qRAuthCode = $qRAuthCode;
    }

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
    public function getBankTraceNo(): ?string
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
     * @return string
     */
    public function getPayAmount(): string
    {
        return $this->payAmount;
    }

    /**
     * @param string $payAmount
     */
    public function setPayAmount(string $payAmount): void
    {
        $this->payAmount = $payAmount;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->bankTraceNo = ArrayUtil::get('BankTraceNo', $this->responseBody);
            $this->qRAuthCode = ArrayUtil::get('QRAuthCode', $this->responseBody);
            $this->orderNo = ArrayUtil::get('OrderNo', $this->responseBody);
            $this->payAmount = ArrayUtil::get('PayAmount', $this->responseBody);
            $this->amount = intval(ArrayUtil::get('Amount', $this->responseBody));
        }
    }
}