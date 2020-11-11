<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/11
 * Time: 下午5:43
 */

namespace Lmh\Cpcn\Constant;


class AccountActivateFlag
{
    /**
     * 企业主动打款激活
     */
    public const PROACTIVE_PAYMENT = 1;
    /**
     *  3 短信验证激活
     */
    public const SMS = 3;
    /**
     *  4 企业被动打款激活
     */
    public const PASSIVE_PAYMENT = 4;
}