<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:49
 */

namespace Lmh\Cpcn\Constant;


class TxResponseCode
{
    /**
     * 表示交易成功 以“交易状态”为准
     */
    public const SUCCESS = '2000';
    /**
     * 重复交易请求。
     */
    public const REPEAT = '2008';
    /**
     *
     */
    public const TRADE_SUCCESS = '000000';




}