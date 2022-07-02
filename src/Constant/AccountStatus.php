<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Constant;


class AccountStatus
{
    /**
     *  开户状态 0: 开户中
     */
    public const APPLYING = 0;
    /**
     * 1: 已开户
     */
    public const SUCCESS = 1;
    /**
     * 3: 已销户
     */
    public const CLOSED = 3;
    /**
     * 4: 冻结
     */
    public const FROZEN = 4;
    /**
     * 8: 开户失败
     */
    public const ERROR = 8;




}