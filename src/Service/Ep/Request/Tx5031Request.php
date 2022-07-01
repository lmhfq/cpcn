<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午3:40
 */

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Entity\Tx\SplitItemsEntity;
use Lmh\Cpcn\Support\Xml;

class Tx5031Request extends BaseRequest
{
    protected $txCode = '5031';
    /**
     * @var string 原支付交易流水号，
     * 5011 接口返回的支付交易流水号
     */
    protected $paymentTxSn;
    /**
     * @var int 本次分账后剩余资金处理方式:
     * 1=结算给收款人,
     * 2=等待后续分账
     */
    protected $remainFundsProcess = 2;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';
    /**
     * @var array[SplitItemsEntity] 分账退款结算域
     * @see SplitItemsEntity
     */
    protected $splitItems;

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
            'RemainFundsProcess' => $this->getRemainFundsProcess(),
            'NoticeURL' => $this->getNoticeUrl(),
        ];
        $splitItems = [];
        foreach ($this->splitItems as $v) {
            /**
             * @var $v SplitItemsEntity
             */
            $splitItems[] = [
                'SplitTxSN' => $v->getSplitTxSn(),
                'SplitUserID' => $v->getSpLitUserId(),
                'SplitAccountNumber' => $v->getSplitAccountNumber(),
                'SplitAmount' => $v->getSplitAmount(),
                'Note' => $v->getNote(),
            ];
        }
        $body = array_merge($body, $splitItems);
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
    public function getRemainFundsProcess(): int
    {
        return $this->remainFundsProcess;
    }

    /**
     * @param int $remainFundsProcess
     */
    public function setRemainFundsProcess(int $remainFundsProcess): void
    {
        $this->remainFundsProcess = $remainFundsProcess;
    }

    /**
     * @return string
     */
    public function getNoticeUrl(): ?string
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
}