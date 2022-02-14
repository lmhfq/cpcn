<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 下午5:40
 */

namespace Lmh\Cpcn\Entity\Tx;


class PayDataEntity
{
    /**
     * @var string 快捷绑定流水号
     * 支付方式：10 时必填（UserID 对应为个人才支持）
     */
    protected $bindingTxSn;
    /**
     * @var string 验短标识:
     */
    protected $smsVerification;

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
     * @return string
     */
    public function getSmsVerification(): string
    {
        return $this->smsVerification;
    }

    /**
     * @param string $smsVerification
     */
    public function setSmsVerification(string $smsVerification): void
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
    public function getRedirectSource(): string
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
    public function getRedirectPayBankId(): string
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
    public function getSubOpenId(): string
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

}