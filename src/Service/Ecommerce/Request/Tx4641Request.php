<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午6:18
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;


use Lmh\Cpcn\Constant\PaymentWay;
use Lmh\Cpcn\Support\Xml;

class Tx4641Request extends BaseRequest
{
    protected $txCode = '4641';
    /**
     * @var int 支付方式:
     * 10=快捷支付
     * 20=网银支付
     * 40=聚合支付
     * 80=跳转支付
     */
    protected $paymentWay = 80;
    /**
     * @var string 确权方式
     */
    protected $acceptanceConfirmType = '';
    /**
     * @var int 交易金额
     * 单位：分
     */
    protected $amount = 0;
    /**
     * @var string 交易失效时间
     * 目前仅支持聚合支付， 默认为 30 天 （30*24*60 分钟），单位：分钟
     */
    protected $expirePeriod = 60;
    /**
     * @var string 回调 URL 地址
     */
    protected $noticeUrl;
    /**
     * @var string 回调 URL 地址
     */
    protected $pageUrl;
    /**
     * @var string  商品名称
     * PaymentWay=40/80 必填
     */
    protected $goodsName;
    /**
     * @var string 平台名称
     */
    protected $platformName;
    /**
     * @var string 备注
     */
    protected $remark;
    /**
     * @var string 用户 IP
     */
    protected $clientIP;
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
     * @return int
     */
    public function getPaymentWay(): int
    {
        return $this->paymentWay;
    }

    /**
     * @param int $paymentWay
     */
    public function setPaymentWay(int $paymentWay): void
    {
        $this->paymentWay = $paymentWay;
    }

    /**
     * @return string
     */
    public function getAcceptanceConfirmType(): string
    {
        return $this->acceptanceConfirmType;
    }

    /**
     * @param string $acceptanceConfirmType
     */
    public function setAcceptanceConfirmType(string $acceptanceConfirmType): void
    {
        $this->acceptanceConfirmType = $acceptanceConfirmType;
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
    public function getExpirePeriod(): string
    {
        return $this->expirePeriod;
    }

    /**
     * @param string $expirePeriod
     */
    public function setExpirePeriod(string $expirePeriod): void
    {
        $this->expirePeriod = $expirePeriod;
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
            'UserID' => $this->getUserId(),
            'PaymentWay' => $this->getPaymentWay(),
            'AcceptanceConfirmType' => $this->getAcceptanceConfirmType(),
            'Amount' => $this->getAmount(),
            'ExpirePeriod' => $this->getExpirePeriod(),
            'NoticeURL' => $this->getNoticeUrl(),
            'PageURL' => $this->getPageUrl(),
            'GoodsName' => $this->getGoodsName(),
            'Remark' => $this->getRemark(),
            'ClientIP' => $this->getClientIP(),
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
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
    }
}