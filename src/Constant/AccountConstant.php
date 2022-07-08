<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/7/5
 * Time: 上午11:15
 */

namespace Lmh\Cpcn\Constant;


class AccountConstant
{

    /**
     * 10-余额支付 20-用户收单 30-用户代付 40-用户分账 41-用户收款 60-用户提现 80-线上签约 90-用户验证
     */
    public const AUTH_TYPE_10 = '10';
    public const AUTH_TYPE_20 = '20';
    public const AUTH_TYPE_30 = '30';
    public const AUTH_TYPE_40 = '40';
    public const AUTH_TYPE_41 = '41';
    public const AUTH_TYPE_60 = '60';
    public const AUTH_TYPE_80 = '80';
    public const AUTH_TYPE_90 = '90';

    /**
     * 1 无需验证
     */
    public const MAINTAIN_STATUS_NOT_VERIFICATION = 1;
    /**
     * 需人工审核激活
     */
    public const MAINTAIN_STATUS_EXAMINE = 2;
    /**
     * 3 短信验证激活
     */
    public const MAINTAIN_STATUS_SMS = 3;
    /**
     * 4 企业被动打款激活
     */
    public const MAINTAIN_STATUS_PASSIVE_PAYMENT = 4;
    /**
     * 5需要 异步网关页面激活
     */
    public const MAINTAIN_STATUS_ASYNC_NOTIFY = 5;
}