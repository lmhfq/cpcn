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
     * @var string 正常入金
     */
    public const A00 = 'A00';
    /**
     * @var string 入金成功后，再冻结资金
     */
    public const B00 = 'B00';

}