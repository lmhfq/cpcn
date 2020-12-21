<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/12/21
 * Time: 上午9:55
 */

namespace Lmh\Cpcn\Constant;


class AccountFcFlag
{
    /**
     * 开户
     */
    public const CREATE = 1;
    /**
     * 变更
     */
    public const MODIFY = 2;
    /**
     * 销户
     */
    public const CANCEL = 3;
}