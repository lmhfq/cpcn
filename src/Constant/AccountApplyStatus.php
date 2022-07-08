<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/7/2
 * Time: 上午10:08
 */

namespace Lmh\Cpcn\Constant;


class AccountApplyStatus
{
    /**
     * 10=受理成功 20=处理中 28=待账户验证 29=审核中 30=成功 40=失败
     */
    public const ACCEPTED = 10;
    public const PROGRESS = 20;
    public const ACCOUNT_VERIFICATION = 28;
    public const EXAMINE = 29;
    public const SUCCESS = 30;
    public const ERROR = 40;
}