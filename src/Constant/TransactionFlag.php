<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Constant;


class TransactionFlag
{
    /**
     * @var string 正常入金/普通订单支付/冻结/正常出金
     */
    public const A00 = 'A00';
    /**
     * @var string 入金成功后再冻结资金/收款方收款成功后再冻结资金/解冻
     */
    public const B00 = 'B00';
    /**
     * @var string 付款方解冻资金后，再支付给收款方/解冻资金后，再出金
     */
    public const B01 = 'B01';
    /**
     * @var string 预付款 资金资金支付 后生成预付款
     */
    public const Y01 = 'Y01';

}