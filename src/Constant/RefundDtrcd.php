<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午7:54
 */

namespace Lmh\Cpcn\Constant;


class RefundDtrcd
{
    /**
     * @var string UIN:渠道入金
     */
    public const UIN = 'UIN';
    /**
     * @var string 订单支付  3001-3007
     */
    public const PAY = 'PAY';
    /**
     * @var string 入金支付  3061-3069
     */
    public const INPAY = 'INPAY';
}