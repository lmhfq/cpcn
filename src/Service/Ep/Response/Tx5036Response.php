<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/21
 * Time: 上午11:03
 */

namespace Lmh\Cpcn\Service\Ep\Response;


class Tx5036Response extends BaseResponse
{
    /**
     * @var int 支付总金额，单位：分
     */
    protected $amount;
    /**
     * @var int 可用分账金额，单位：分
     */
    protected $availableSplitAmount;
    /**
     * @var array
     */
    protected $splitItems;

}