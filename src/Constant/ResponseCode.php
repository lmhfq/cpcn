<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Constant;


class ResponseCode
{
    /**
     * 表示交易成功。同步交易，指业务办理成功；异步交易，指交易成功 但业务办理结果未知，
     */
    public const SUCCESS = '000000';
    /**
     * 则表示开户处理中，需要通过 T1002 查询开户结果
     */
    public const E3010 = 'E3010';
    /**
     *  远程通信失败
     */
    public const SDER02 = 'SDER02';
    /**
     * 合作方不支持该交易
     */
    public const SDER07 = 'SDER07';
    /**
     * 该交易已经处理成功
     */
    public const PYSUCC = 'PYSUCC';
    /**
     * 查询不到 XXXX 数据
     */
    public const NW8574 = 'NW8574';
    /**
     * 请稍后查询结果
     */
    public const SJYCLZ = 'SJYCLZ';
    /**
     * 每日转账金额超限
     */
    public const DB3136 = 'DB3136';
    /**
     * 账户可用资金不足
     */
    public const DB3139 = 'DB3139';
    /**
     * 账户可解冻资金不足
     */
    public const DB3155 = 'DB3155';
    /**
     * 交易金额错误
     */
    public const DB3151 = 'DB3151';
    /**
     * 合作方交易流水号重复使用
     */
    public const DB3192 = 'DB3192';
}