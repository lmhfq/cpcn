<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 上午11:34
 */

namespace Lmh\Cpcn\Constant;


class RedirectPay
{
    /**
     * 跳转前来源:
     * 10=App
     * 20=H5
     * 30=公众号
     * 40=小程序
     */
    public const SOURCE_APP = 10;
    public const SOURCE_H5 = 20;
    public const SOURCE_OFFICIAL_ACCOUNT = 30;
    public const SOURCE_MINI_PROGRAM = 40;


    /**
     *支付方式
     * 45=H5 支付
     * （PayType=30、32、33）
     * 46=APP 支付
     * （PayType=30、31、32、33）
     * 47=手机迷你付
     * （PayType=33）
     * 48=手机 Pay
     * （PayType=34、35）
     * 50=JSAPI
     * （PayType=31、32）
     * 51=小程序支付
     * （PayType=31）
     */

    public const PAYWAY_H5 = 45;
    public const PAYWAY_APP = 46;
    public const PAYWAY_MOBILE_MINI = 47;
    public const PAYWAY_MOBILE_PAY = 48;
    public const PAYWAY_JSAPI = 50;
    public const PAYWAY_MINI_PROGRAM = 51;

    /**
     * 支付类型
     * 30=手机网银
     * 31=微信
     * 32=支付宝
     * 33=银联
     * 34=Apple Pay
     * 35=Android Pay
     */
    public const PayType_ONLINE_BANK = 30;
    public const PayType_WECHAT = 31;
    public const PayType_ALIPAY = 32;
    public const PayType_UNIONPAY = 33;
    public const PAYTYPE_APPLE_PAY = 34;
    public const PAYTYPE_ANDROID_PAY = 35;
}