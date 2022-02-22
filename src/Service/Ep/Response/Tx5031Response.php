<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/21
 * Time: 上午11:04
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5031Response extends BaseResponse
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
     * @return int
     */
    public function getAmount(): int
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
        return $this->responseTime ?: '';
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->amount = intval(ArrayUtil::get('Amount', $this->responseBody));
            $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->responseBody));
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->sumPayeeFee = intval(ArrayUtil::get('SumPayeeFee', $this->responseBody));
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
        }
    }
}