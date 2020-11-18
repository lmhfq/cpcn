<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:44
 */

namespace Lmh\Cpcn\Notify;


class NtcT2020Request extends NtcBaseRequest
{
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 资金用途(附言)
     */
    protected $usage;
    /**
     * @var string 出金结算状态(查询出金结果时返回) 0 未结算 1 已发送结算申请
     */
    protected $ubalsta;
    /**
     * @var string 出金结算时间(查询出金结果时返回) 格式 YYYYMMDDHH24MISS UBalSta=1 时指成功发送结 算申请的时间
     */
    protected $ubaltim;
    /**
     * @var string 原交易日期
     */
    protected $fdate;
    /**
     * @var string 原交易时间
     */
    protected $ftime;


    public function handle(string $message, string $signature)
    {
        // TODO: Implement handle() method.
    }
}