<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/13
 * Time: 下午7:04
 */

namespace Lmh\Cpcn\Constant;


class TransactionFlag
{
    /**
     * @var string 正常入金/普通订单支付
     */
    public const A00 = 'A00';
    /**
     * @var string 入金成功后，再冻结资金/收款方收款成功后，再冻结资金
     */
    public const B00 = 'B00';

    /**
     * @var string 付款方解冻资金后，再支付给收款方
     */
    public const B01 = 'B01';
    /**
     * @var string 预付款 资金资金支付 后生成预付款
     */
    public const Y01 = 'Y01';

}