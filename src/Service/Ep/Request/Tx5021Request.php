<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:40
 */

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Entity\Tx\SplitItemsEntity;
use Lmh\Cpcn\Support\Xml;

class Tx5021Request extends BaseRequest
{
    protected $txCode = '5021';
    /**
     * @var string 原支付交易流水号，
     * 上传 5011 的 TxSn 或 5012 接口的 TxSn
     */
    protected $paymentTxSn;
    /**
     * @var string 原支付交易时间，
     * 格式：yyyyMMdd；
     */
    protected $sourceTxTime;
    /**
     * @var int 退款方式:
     * 10=退款到用户账户
     * 20=原路退款
     */
    protected $refundWay = 20;
    /**
     * @var int 退款金额
     */
    protected $amount;
    /**
     * @var int 撤销金额
     */
    protected $cancelAmount;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl;
    /**
     * @var string 备注
     */
    protected $remark;
    /**
     * @var array 分账退款结算域
     */
    protected $splitItems;

    /**
     * @return string
     */
    public function getNoticeUrl(): string
    {
        return $this->noticeUrl;
    }

    /**
     * @param string $noticeUrl
     */
    public function setNoticeUrl(string $noticeUrl): void
    {
        $this->noticeUrl = $noticeUrl;
    }

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return array
     */
    public function getSplitItems(): array
    {
        return $this->splitItems;
    }

    /**
     * @param array $splitItems
     */
    public function setSplitItems(array $splitItems): void
    {
        $this->splitItems = $splitItems;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'PaymentTxSN' => $this->getPaymentTxSn(),
            'RefundWay' => $this->getRefundWay(),
            'Amount' => $this->getAmount(),
        ];
        if ($this->sourceTxTime) {
            $body['SourceTxTime'] = $this->getSourceTxTime();
        }
        if ($this->cancelAmount) {
            $body['CancelAmount'] = $this->getCancelAmount();
        }
        if ($this->splitItems) {
            $splitItems = [];
            foreach ($this->splitItems as $v) {
                /**
                 * @var $v SplitItemsEntity
                 */
                $splitItems[] = [
                    'SplitPaymentTxS' => $v->getSplitTxSn(),
                    'SplitAmount' => $v->getSplitAmount(),
                    'Note' => $v->getNote(),
                ];
            }
            $body = array_merge($body, $splitItems);
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', 'SplitItems', 'UTF-8');
        parent::handle();
    }

    /**
     * @return string
     */
    public function getPaymentTxSn(): string
    {
        return $this->paymentTxSn;
    }

    /**
     * @param string $paymentTxSn
     */
    public function setPaymentTxSn(string $paymentTxSn): void
    {
        $this->paymentTxSn = $paymentTxSn;
    }

    /**
     * @return int
     */
    public function getRefundWay(): int
    {
        return $this->refundWay;
    }

    /**
     * @param int $refundWay
     */
    public function setRefundWay(int $refundWay): void
    {
        $this->refundWay = $refundWay;
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
     * @return string
     */
    public function getSourceTxTime(): string
    {
        return $this->sourceTxTime;
    }

    /**
     * @param string $sourceTxTime
     */
    public function setSourceTxTime(string $sourceTxTime): void
    {
        $this->sourceTxTime = $sourceTxTime;
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
}