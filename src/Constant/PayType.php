<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/13
 * Time: 下午4:00
 */

namespace Lmh\Cpcn\Constant;


class PayType
{
    /**
     *  网银
     */
    public const ONLINE_BANK = '2';
    /**
     * 快捷支付
     */
    public const FAST_PAYMENT = '5';
    /**
     * 正扫支付
     */
    public const SCAN = '6';
    /**
     * 公众号支付
     */
    public const JSAPI = '8';
    /**
     * 银联无卡支付
     */
    public const UNIONPAY = '9';
    /**
     * 手机APP 跳转支付
     */
    public const APP = 'A';
    /**
     * H5支付
     */
    public const H5 = 'H';
    /**
     * 移动大额支付
     */
    public const TRANSFER = 'L';
}