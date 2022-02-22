<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/22
 * Time: 下午2:25
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx4658Notify extends TBaseNotify
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
    protected $amount;
    /**
     * @var int
     */
    protected $status;
    /**
     * @var int 支付方式:
     * 10=快捷支付
     * 20=网银支付
     * 40=聚合支付
     * 50=转账充值
     * 80=跳转支付
     * 91=合并结算
     */
    protected $paymentWay;
    /**
     * @var string 绑卡流水号
     *
     */
    protected $bindingTxSn;
    /**
     * @var int 提现方式；
     * 0-接口提现
     * 1-商户服务系统提现
     * 2-自动提现
     */
    protected $withdrawalType;
    /**
     * @var string
     */
    protected $responseTime;

    /**
     * @return string
     */
    public function getSourceTxCode(): string
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
     * @return int
     */
    public function getPaymentWay(): int
    {
        return $this->paymentWay;
    }

    /**
     * @return string
     */
    public function getBindingTxSn(): string
    {
        return $this->bindingTxSn ?: '';
    }

    /**
     * @return int
     */
    public function getWithdrawalType(): int
    {
        return $this->withdrawalType;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
    {
        return $this->responseTime;
    }

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->amount = intval(ArrayUtil::get('Amount', $this->noticeBody));
        $this->sourceTxCode = ArrayUtil::get('SourceTxCode', $this->noticeBody);
        $this->sourceTxSn = ArrayUtil::get('SourceTxSN', $this->noticeBody);
        $this->bindingTxSn = ArrayUtil::get('BindingTxSN', $this->noticeBody);
        $this->responseTime = ArrayUtil::get('ResponseTime', $this->noticeBody);
    }

}