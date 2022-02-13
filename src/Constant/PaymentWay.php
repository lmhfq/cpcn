<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 上午11:47
 */

namespace Lmh\Cpcn\Constant;


class PaymentWay
{
    /**
     * 快捷支付
     */
    public const QUICK_PAY = 10;
    /**
     * 网银支付
     */
    public const EBANK_PAY = 20;
    /**
     * 聚合支付
     */
    public const QR_PAY = 40;
    /**
     * 跳转支付
     */
    public const REDIRECT_PAY = 80;
}