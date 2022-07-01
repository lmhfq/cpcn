<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/21
 * Time: 下午1:55
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5021Response extends BaseResponse
{
    /**
     * @var string 退款回单流水号
     */
    protected $refundTraceNo;
    /**
     * @var int  退款金额，单位：分
     */
    protected $amount;
    /**
     * @var int 返还收款用户手续费总金额,单位：分
     */
    protected $returnPayeeUserFee;
    /**
     * @var int 退款状态
     * 10=受理成功
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
    public function getRefundTraceNo(): ?string
    {
        return $this->refundTraceNo;
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
    public function getResponseTime(): ?string
    {
        return $this->responseTime;
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
            $this->returnPayeeUserFee = intval(ArrayUtil::get('ReturnPayeeUserFee', $this->responseBody));
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->refundTraceNo = ArrayUtil::get('RefundTraceNo', $this->responseBody);
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
        }
    }
}