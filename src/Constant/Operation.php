<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Constant;


class Operation
{
    /**
     * 操作标识:
     * 10=绑卡
     * 20=解绑
     * 30=升级
     */
    public const FLAG_BIND = 10;
    public const FLAG_UNBIND = 20;
    public const FLAG_UPGRADE = 30;

    /**
     * 操作类型：
     * 10=冻结
     */
    public const TYPE_FREEZE = 10;
    public const TYPE_THAWING = 20;
    public const TYPE_SHARE_FREEZE = 30;
}