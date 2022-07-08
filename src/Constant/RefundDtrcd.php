<?php
declare(strict_types=1);


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