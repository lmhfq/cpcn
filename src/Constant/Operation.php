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
     * 10=冻结 11=按金额冻结 20=解冻 21-解冻-按金额冻 结30=解冻-分账并冻结
     */
    public const TYPE_FREEZE = 10;
    public const TYPE_FREEZE_BY_AMOUNT = 11;
    public const TYPE_THAWING = 20;
    public const TYPE_THAWING_BY_AMOUNT  = 21;
    public const TYPE_SHARE_FREEZE = 30;
}