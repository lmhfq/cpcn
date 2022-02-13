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
     * 网银
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

    /**
     * 支付类别
     * 00-正扫
     * 01-反扫
     * 10-APP
     * 11-JSAPI
     * 12-小程序
     * 13-H5
     */
    public const TX_SCAN = '00';
    public const TX_JSAPI = '11';
    public const TX_MINI_PROGRAM = '12';
    public const TX_H5 = '13';
}