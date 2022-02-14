<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午4:40
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

use Lmh\Cpcn\Constant\PaymentWay;
use Lmh\Cpcn\Entity\Tx\SplitItemsEntity;
use Lmh\Cpcn\Support\Xml;

class Tx5011Request extends BaseRequest
{
    protected $txCode = '5011';
    /**
     * @var string
     */
    protected $orderNo;
    /**
     * @var string
     */
    protected $terminalUserId;
    /**
     * @var string 付款用户ID
     */
    protected $payerUserId;
    /**
     * @var string 收款用户ID
     */
    protected $payeeUserId;
    /**
     * @var string 收款用户帐号
     * 收款用户 ID 是机构用户时才可以填写收款用户帐号，且收款用户帐号只能填写结算标识
     */
    protected $payeeAccountNumber;
    /**
     * @var string
     */
    protected $paymentWay;
    /**
     * @var int 交易金额
     * 单位：分
     * PaymentWay=42,ScanPaymentType=40 时,金额可为 0
     * 00-余额支付时，支付方式选择域不传；
     * 非 00-余额支付时，有且只能传一种支付方式选择域
     */
    protected $amount;
    /**
     * @var string 交易失效时间
     * 目前仅支持聚合支付， 默认为 30 天 （30*24*60 分钟），单位：分钟
     */
    protected $expirePeriod = 60;
    /**
     * @var string 回调 URL 地址
     */
    protected $pageUrl = '';
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';
    /**
     * @var string  商品名称
     * PaymentWay=40/80 必填
     */
    protected $goodsName;
    /**
     * @var string 平台名称
     * PaymentWay=80 必填
     */
    protected $platformName;
    /**
     * @var string 用户 IP
     * PaymentWay=80 必填
     */
    protected $clientIP;
    /**
     * @var int 是否有后续分账
     * 1-否 2-是
     */
    protected $hasSubsequentSplit = 1;
    /**
     * @var string 备注
     */
    protected $remark;
    /**
     * @var string 实时扣收手续费挂账的结算标识
     */
    protected $deductionSettlementFlag;
    /**
     * @var string 扩展字段 JSON 对象数据
     */
    protected $extension;
    /**
     * @var array 分账结算域
     * 当HasSubsequentSplit=1时必填
     */
    protected $splitItems = [];
    /**
     * @var array 快捷支付选择域
     * 支付方式：10 时必填（UserID 对应为个人才支持）
     * [BindingTxSN]
     */
    protected $quickPay = [];
    /**
     * @var array 网银支付方式选择域
     * 支付方式：20 时必填
     */
    protected $eBankPay = [];
    /**
     * @var array 聚合支付方式选择域
     * 支付方式：40 时必填
     * <QRPaymentType/>
     * <QRPaymentWay/>
     * <PaymentScene/>
     * <PreTxSN/>
     * <QRPayCode/>
     * <OpenID/>
     * <MerchantAppID/>
     */
    protected $qRPay = [];
    /**
     * @var array 跳转支付选择域
     * 支付方式：80 时必填
     * <PayWay/>
     * <PayType/>
     * <RedirectPayBankID/>
     */
    protected $redirectPay = [];

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
     * @return string
     */
    public function getTerminalUserId(): string
    {
        return $this->terminalUserId;
    }

    /**
     * @param string $terminalUserId
     */
    public function setTerminalUserId(string $terminalUserId): void
    {
        $this->terminalUserId = $terminalUserId;
    }

    /**
     * @return string
     */
    public function getPayerUserId(): string
    {
        return $this->payerUserId;
    }

    /**
     * @param string $payerUserId
     */
    public function setPayerUserId(string $payerUserId): void
    {
        $this->payerUserId = $payerUserId;
    }

    /**
     * @return string
     */
    public function getPayeeUserId(): string
    {
        return $this->payeeUserId;
    }

    /**
     * @param string $payeeUserId
     */
    public function setPayeeUserId(string $payeeUserId): void
    {
        $this->payeeUserId = $payeeUserId;
    }

    /**
     * @return string
     */
    public function getPayeeAccountNumber(): string
    {
        return $this->payeeAccountNumber;
    }

    /**
     * @param string $payeeAccountNumber
     */
    public function setPayeeAccountNumber(string $payeeAccountNumber): void
    {
        $this->payeeAccountNumber = $payeeAccountNumber;
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
    public function getExpirePeriod()
    {
        return $this->expirePeriod;
    }

    /**
     * @param string $expirePeriod
     */
    public function setExpirePeriod($expirePeriod): void
    {
        $this->expirePeriod = $expirePeriod;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @param string $pageUrl
     */
    public function setPageUrl(string $pageUrl): void
    {
        $this->pageUrl = $pageUrl;
    }

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
    public function getGoodsName(): string
    {
        return $this->goodsName;
    }

    /**
     * @param string $goodsName
     */
    public function setGoodsName(string $goodsName): void
    {
        $this->goodsName = $goodsName;
    }

    /**
     * @return string
     */
    public function getPlatformName(): string
    {
        return $this->platformName;
    }

    /**
     * @param string $platformName
     */
    public function setPlatformName(string $platformName): void
    {
        $this->platformName = $platformName;
    }

    /**
     * @return string
     */
    public function getClientIP(): string
    {
        return $this->clientIP;
    }

    /**
     * @param string $clientIP
     */
    public function setClientIP(string $clientIP): void
    {
        $this->clientIP = $clientIP;
    }

    /**
     * @return int
     */
    public function getHasSubsequentSplit(): int
    {
        return $this->hasSubsequentSplit;
    }

    /**
     * @param int $hasSubsequentSplit
     */
    public function setHasSubsequentSplit(int $hasSubsequentSplit): void
    {
        $this->hasSubsequentSplit = $hasSubsequentSplit;
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
     * @return string
     */
    public function getDeductionSettlementFlag(): string
    {
        return $this->deductionSettlementFlag;
    }

    /**
     * @param string $deductionSettlementFlag
     */
    public function setDeductionSettlementFlag(string $deductionSettlementFlag): void
    {
        $this->deductionSettlementFlag = $deductionSettlementFlag;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     */
    public function setExtension(string $extension): void
    {
        $this->extension = $extension;
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

    /**
     * @return array
     */
    public function getQuickPay(): array
    {
        return $this->quickPay;
    }

    /**
     * @param array $quickPay
     */
    public function setQuickPay(array $quickPay): void
    {
        $this->quickPay = $quickPay;
    }

    /**
     * @return array
     */
    public function getEBankPay(): array
    {
        return $this->eBankPay;
    }

    /**
     * @param array $eBankPay
     */
    public function setEBankPay(array $eBankPay): void
    {
        $this->eBankPay = $eBankPay;
    }

    /**
     * @return array
     */
    public function getQRPay(): array
    {
        return $this->qRPay;
    }

    /**
     * @param array $qRPay
     */
    public function setQRPay(array $qRPay): void
    {
        $this->qRPay = $qRPay;
    }

    /**
     * @return array
     */
    public function getRedirectPay(): array
    {
        return $this->redirectPay;
    }

    /**
     * @param array $redirectPay
     */
    public function setRedirectPay(array $redirectPay): void
    {
        $this->redirectPay = $redirectPay;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'OrderNo' => $this->getOrderNo(),
            'TerminalUserID' => $this->getTerminalUserId(),
            'PayerUserID' => $this->getPayerUserId(),
            'PayeeUserID' => $this->getPayeeUserId(),
            'PayeeAccountNumber' => $this->getPayeeAccountNumber(),
            'PaymentWay' => $this->getPaymentWay(),
            'Amount' => $this->getAmount(),
            'ExpirePeriod' => $this->getExpirePeriod(),
            'PageURL' => $this->getPageUrl(),
            'NoticeURL' => $this->getNoticeUrl(),
            'ClientIP' => $this->getClientIP(),
            'GoodsName' => $this->getGoodsName(),
            'HasSubsequentSplit' => $this->getHasSubsequentSplit(),
            'DeductionSettlementFlag' => $this->getDeductionSettlementFlag(),
            'Remark' => $this->getRemark(),
            'Extension' => $this->getExtension(),
        ];
        switch ($this->paymentWay) {
            case PaymentWay::QUICK_PAY:
                $body['QuickPay'] = $this->getQuickPay();
                break;
            case PaymentWay::EBANK_PAY:
                $body['EBankPay>'] = $this->getEBankPay();
                break;
            case PaymentWay::QR_PAY:
                $body['QRPay'] = $this->getQRPay();
                break;
            case PaymentWay::REDIRECT_PAY:
                $body['RedirectPay'] = $this->getRedirectPay();
                $body['PlatformName'] = $this->getPlatformName();
                break;
        }
        if ($this->hasSubsequentSplit == 1) {
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
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', 'SplitItems', 'UTF-8');
    }
}