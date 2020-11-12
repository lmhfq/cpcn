<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/12
 * Time: 下午4:48
 */

namespace Lmh\Cpcn\Constant;


class AccountMaintainStatus
{
    /**
     * 1 无需验证
     */
    public const NOT_VERIFICATION = 1;
    /**
     * 需人工审核激活
     */
    public const EXAMINE = 2;
    /**
     *  3 短信验证激活
     */
    public const SMS = 3;
    /**
     *  4 企业被动打款激活
     */
    public const PASSIVE_PAYMENT = 4;
    /**
     *  5需要 异步网关页面激活
     */
    public const ASYNC_NOTIFY = 5;
}