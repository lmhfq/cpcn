<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Entity\Tx;


class PayDataEntity
{
    /**
     * @var string 快捷绑定流水号
     * 支付方式：10 时必填（UserID 对应为个人才支持）
     */
    protected $bindingTxSn;
    /**
     * @var int 验短标识:
     * 0-不需要 1-需要
     */
    protected $smsVerification = 1;

    /**
     * @var string 银行 ID
     */
    protected $bankId;
    /**
     * @var int 账户类型：
     * 11=个人账户
     * 12=企业账户
     */
    protected $bankAccountType;
    /**
     * @var string 跳转前来源:
     * 10=App
     * 20=H5
     * 30=公众号
     * 40=小程序
     */
    protected $redirectSource;
    /**
     * @var int
     * 支付方式
     * 45=H5 支付
     * （PayType=30、
     * 32、33）
     * 46=APP 支付
     * （PayType=30、
     * 31、32、33）
     * 47=手机迷你付
     * （PayType=33）
     * 48=手机 Pay
     * （PayType=34、
     * 35）
     * 50=JSAPI
     * （PayType=31、
     * 32）
     * 51=小程序支付
     * （PayType=31）
     */
    protected $payWay;
    /**
     * @var int
     * 支付类型
     * 30=手机网银
     * 31=微信
     * 32=支付宝
     * 33=银联
     * 34=Apple Pay
     * 35=Android Pay
     */
    protected $payType;
    /**
     * @var string 发卡行，
     * 参考《银行编码表》PayType=30 时必填
     */
    protected $redirectPayBankId;
    /**
     * @var string AppID（商户进件录入）
     * 微信必填 PayType=31
     */
    protected $subAppId;
    /**
     * @var string 用户 ID
     * 微信：openid
     * 支付宝：buyer_user_id（PayWay=50/51 必填）
     */
    protected $subOpenId;
    /**
     * @var int 分期控制标识
     * 10-不指定分期
     * 20-指定分期
     * PayType=32、33，
     * PayWay=45-H5 支付时必填
     */
    protected $installmentType = 10;
    /**
     * @var int  手续费收取模式：
     * 10=商户贴息
     * 20=持卡人付费
     * InstallmentType=20 时必填
     */
    protected $feeMode;
    /**
     * @var int 条码支付类型:
     * 10=微信
     * 20=支付宝
     * 30=银联
     * 40=聚合码
     */
    protected $scanPaymentType;
    /**
     * @var string 条码支付方式:
     * 41=正扫
     * 42=反扫
     */
    protected $scanPaymentWay;
    /**
     * @var string 反扫支付授权码
     * 支付场景
     * 10=条码支付
     * 20=声波支付
     * 90=刷脸支付
     */
    protected $paymentScene;
    /**
     * @var string 预下单订单号
     */
    protected $preTxSn;
    /**
     * @var string 反扫支付授权码
     */
    protected $scanPaymentCode;
    /**
     * @var int 账户类型
     * 11=个人账户（默认）
     * 12=企业账户
     */
    protected $accountType;
    /**
     * @var int 信用卡限制标识
     * 10=信用卡可用
     * 20=信用卡不可用
     * 99=无关
     */
    protected $scanPaymentLimitFlag = 10;
    /**
     * @var string 10=不限定 20=仅支持借记卡 30=仅支持贷记卡
     */
    protected $limitPay = '10';
    /**
     * @var string 取消支付后的前台跳转页面
     */
    protected $cancelPayRedirectPageUrl;
    /**
     * @var string 页面跳转方式
     * 10=公众号
     * 20=小程序
     */
    protected $scanPageUrlType = 20;
    /**
     * @var string 成功前台跳转页面
     */
    protected $redirectPageUrl;

    /**
     * @return string
     */
    public function getBindingTxSn(): string
    {
        return $this->bindingTxSn;
    }

    /**
     * @param string $bindingTxSn
     */
    public function setBindingTxSn(string $bindingTxSn): void
    {
        $this->bindingTxSn = $bindingTxSn;
    }

    /**
     * @return int
     */
    public function getSmsVerification(): int
    {
        return $this->smsVerification;
    }

    /**
     * @param int $smsVerification
     */
    public function setSmsVerification(int $smsVerification): void
    {
        $this->smsVerification = $smsVerification;
    }

    /**
     * @return string
     */
    public function getBankId(): string
    {
        return $this->bankId;
    }

    /**
     * @param string $bankId
     */
    public function setBankId(string $bankId): void
    {
        $this->bankId = $bankId;
    }

    /**
     * @return int
     */
    public function getBankAccountType(): int
    {
        return $this->bankAccountType;
    }

    /**
     * @param int $bankAccountType
     */
    public function setBankAccountType(int $bankAccountType): void
    {
        $this->bankAccountType = $bankAccountType;
    }

    /**
     * @return string
     */
    public function getRedirectSource(): ?string
    {
        return $this->redirectSource;
    }

    /**
     * @param string $redirectSource
     */
    public function setRedirectSource(string $redirectSource): void
    {
        $this->redirectSource = $redirectSource;
    }

    /**
     * @return int
     */
    public function getPayWay(): int
    {
        return $this->payWay;
    }

    /**
     * @param int $payWay
     */
    public function setPayWay(int $payWay): void
    {
        $this->payWay = $payWay;
    }

    /**
     * @return int
     */
    public function getPayType(): int
    {
        return $this->payType;
    }

    /**
     * @param int $payType
     */
    public function setPayType(int $payType): void
    {
        $this->payType = $payType;
    }

    /**
     * @return string
     */
    public function getRedirectPayBankId(): ?string
    {
        return $this->redirectPayBankId;
    }

    /**
     * @param string $redirectPayBankId
     */
    public function setRedirectPayBankId(string $redirectPayBankId): void
    {
        $this->redirectPayBankId = $redirectPayBankId;
    }

    /**
     * @return string
     */
    public function getSubAppId(): string
    {
        return $this->subAppId;
    }

    /**
     * @param string $subAppId
     */
    public function setSubAppId(string $subAppId): void
    {
        $this->subAppId = $subAppId;
    }

    /**
     * @return string
     */
    public function getSubOpenId(): ?string
    {
        return $this->subOpenId;
    }

    /**
     * @param string $subOpenId
     */
    public function setSubOpenId(string $subOpenId): void
    {
        $this->subOpenId = $subOpenId;
    }

    /**
     * @return int
     */
    public function getInstallmentType(): int
    {
        return $this->installmentType;
    }

    /**
     * @param int $installmentType
     */
    public function setInstallmentType(int $installmentType): void
    {
        $this->installmentType = $installmentType;
    }

    /**
     * @return int
     */
    public function getFeeMode(): int
    {
        return $this->feeMode;
    }

    /**
     * @param int $feeMode
     */
    public function setFeeMode(int $feeMode): void
    {
        $this->feeMode = $feeMode;
    }

    /**
     * @return int
     */
    public function getScanPaymentType(): int
    {
        return $this->scanPaymentType;
    }

    /**
     * @param int $scanPaymentType
     */
    public function setScanPaymentType(int $scanPaymentType): void
    {
        $this->scanPaymentType = $scanPaymentType;
    }

    /**
     * @return string
     */
    public function getScanPaymentWay(): string
    {
        return $this->scanPaymentWay;
    }

    /**
     * @param string $scanPaymentWay
     */
    public function setScanPaymentWay(string $scanPaymentWay): void
    {
        $this->scanPaymentWay = $scanPaymentWay;
    }

    /**
     * @return string
     */
    public function getPaymentScene(): string
    {
        return $this->paymentScene;
    }

    /**
     * @param string $paymentScene
     */
    public function setPaymentScene(string $paymentScene): void
    {
        $this->paymentScene = $paymentScene;
    }

    /**
     * @return string
     */
    public function getPreTxSn(): string
    {
        return $this->preTxSn;
    }

    /**
     * @param string $preTxSn
     */
    public function setPreTxSn(string $preTxSn): void
    {
        $this->preTxSn = $preTxSn;
    }

    /**
     * @return string
     */
    public function getScanPaymentCode(): string
    {
        return $this->scanPaymentCode;
    }

    /**
     * @param string $scanPaymentCode
     */
    public function setScanPaymentCode(string $scanPaymentCode): void
    {
        $this->scanPaymentCode = $scanPaymentCode;
    }

    /**
     * @return int
     */
    public function getAccountType(): int
    {
        return $this->accountType;
    }

    /**
     * @param int $accountType
     */
    public function setAccountType(int $accountType): void
    {
        $this->accountType = $accountType;
    }

    /**
     * @return int
     */
    public function getScanPaymentLimitFlag(): int
    {
        return $this->scanPaymentLimitFlag;
    }

    /**
     * @param int $scanPaymentLimitFlag
     */
    public function setScanPaymentLimitFlag(int $scanPaymentLimitFlag): void
    {
        $this->scanPaymentLimitFlag = $scanPaymentLimitFlag;
    }

    /**
     * @return string
     */
    public function getCancelPayRedirectPageUrl(): string
    {
        return $this->cancelPayRedirectPageUrl;
    }

    /**
     * @param string $cancelPayRedirectPageUrl
     */
    public function setCancelPayRedirectPageUrl(string $cancelPayRedirectPageUrl): void
    {
        $this->cancelPayRedirectPageUrl = $cancelPayRedirectPageUrl;
    }

    /**
     * @return string
     */
    public function getScanPageUrlType()
    {
        return $this->scanPageUrlType;
    }

    /**
     * @param string $scanPageUrlType
     */
    public function setScanPageUrlType(string $scanPageUrlType): void
    {
        $this->scanPageUrlType = $scanPageUrlType;
    }

    /**
     * @return string
     */
    public function getRedirectPageUrl(): string
    {
        return $this->redirectPageUrl;
    }

    /**
     * @param string $redirectPageUrl
     */
    public function setRedirectPageUrl(string $redirectPageUrl): void
    {
        $this->redirectPageUrl = $redirectPageUrl;
    }

    /**
     * @return string
     */
    public function getLimitPay(): string
    {
        return $this->limitPay;
    }

    /**
     * @param string $limitPay
     */
    public function setLimitPay(string $limitPay): void
    {
        $this->limitPay = $limitPay;
    }

}