<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Constant\PaymentWay;
use Lmh\Cpcn\Entity\Tx\PayDataEntity;
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
     * @var string 支付方式:
     * 00=余额支付
     * 10=快捷支付 20=网银支付 30=代收支付
     * 42=条码支付 43-扫码预授权 50=O2O
     * 80-跳转支付
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
     * @var int|null 交易失效时间
     * 目前仅支持聚合支付， 默认为 30 天 （30*24*60 分钟），单位：分钟
     */
    protected $expirePeriod = 60;
    /**
     * @var string|null 商户交易发起的时间 yyyyMMddHHmmss
     */
    protected $sourceTxTime;
    /**
     * @var string 回调 URL 地址
     */
    protected $pageUrl = '';
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';
    /**
     * @var string|null  商品名称
     * PaymentWay=40/80 必填
     */
    protected $goodsName;
    /**
     * @var string 平台名称
     * PaymentWay=80 必填
     */
    protected $platformName;
    /**
     * @var string|null 用户 IP
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
    protected $deductionSettlementFlag = '0001';
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
     * @var PayDataEntity
     */
    protected $payData;

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
     * @return PayDataEntity
     */
    public function getPayData(): PayDataEntity
    {
        return $this->payData;
    }

    /**
     * @param PayDataEntity $payData
     */
    public function setPayData(PayDataEntity $payData): void
    {
        $this->payData = $payData;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'OrderNo' => $this->getOrderNo(),
            'PayerUserID' => $this->getPayerUserId(),
            'PayeeUserID' => $this->getPayeeUserId(),
            'PayeeAccountNumber' => $this->getPayeeAccountNumber(),
            'PaymentWay' => $this->getPaymentWay(),
            'Amount' => $this->getAmount(),
            'PageURL' => $this->getPageUrl(),
            'NoticeURL' => $this->getNoticeUrl(),
            'GoodsName' => $this->getGoodsName(),
            'HasSubsequentSplit' => $this->getHasSubsequentSplit(),
            'DeductionSettlementFlag' => $this->getDeductionSettlementFlag(),
            'Remark' => $this->getRemark(),
            'Extension' => $this->getExtension(),
        ];
        if ( $this->getExpirePeriod()){
            $body['ExpirePeriod'] =$this->getExpirePeriod();
        }
        if ( $this->getSourceTxTime()){
            $body['SourceTxTime'] =$this->getSourceTxTime();
        }
        switch ($this->paymentWay) {
            case PaymentWay::QUICK_PAY:
                $body['QuickPay'] = [
                    'BindingTxSN' => $this->payData->getBindingTxSn(),
                    'SMSVerification' => $this->payData->getSmsVerification(),
                ];
                break;
            case PaymentWay::EBANK_PAY:
                $body['EBankPay'] = [];
                break;
            case PaymentWay::QR_PAY:
                $body['QRPay'] = [];
                break;
            case PaymentWay::REDIRECT_PAY:
                $body['RedirectPay'] = [
                    'RedirectSource' => $this->payData->getRedirectSource(),
                    'PayWay' => $this->payData->getPayWay(),
                    'PayType' => $this->payData->getPayType(),
                    'RedirectPayBankID' => $this->payData->getRedirectPayBankId(),
                    'SubAppID' => $this->payData->getSubAppId(),
                    'SubOpenID' => $this->payData->getSubOpenId(),
                    'InstallmentType' => $this->payData->getInstallmentType(),
                    'LimitPay' => $this->payData->getLimitPay(),
                ];
                $body['PlatformName'] = $this->getPlatformName();
                $body['ClientIP'] =$this->getClientIP();
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
        parent::handle();
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
     * @return string
     */
    public function getPayerUserId(): ?string
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
    public function getPayeeAccountNumber(): ?string
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
     * @return int|null
     */
    public function getExpirePeriod(): ?int
    {
        return $this->expirePeriod;
    }

    /**
     * @param int|null $expirePeriod
     */
    public function setExpirePeriod(?int $expirePeriod): void
    {
        $this->expirePeriod = $expirePeriod;
    }

    /**
     * @return string
     */
    public function getSourceTxTime(): ?string
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

    /**
     * @return string
     */
    public function getClientIP(): ?string
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
     * @return string
     */
    public function getGoodsName(): ?string
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
    public function getExtension(): ?string
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
     * @return string
     */
    public function getPlatformName(): ?string
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
}