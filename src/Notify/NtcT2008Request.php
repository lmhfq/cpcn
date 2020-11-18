<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:28
 */

namespace Lmh\Cpcn\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class NtcT2008Request extends NtcBaseRequest
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
     * @var string 银行编号
     */
    protected $bkacc_bkid;
    /**
     * @var string 银行账号(卡号)
     */
    protected $bkacc_accno;
    /**
     * @var string 开户名称
     */
    protected $bkacc_accnm;
    /**
     * @var string 开户网点编号
     */
    protected $bkacc_openbkcd;
    /**
     * @var string 开户网点名称
     */
    protected $bkacc_openbknm;
    /**
     * @var int 发生额
     */
    protected $amt_aclamt;
    /**
     * @var string 手续费
     */
    protected $amt_feeamt;
    /**
     * @var string 总金额(发生额+转账手续费)
     */
    protected $amt_tamt;
    /**
     * @var string
     */
    protected $amt_ccycd;
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
     * @var string 业务标示 A00 正常入金 B00 入金成功后，再冻结资 金
     */
    protected $dTrsFlag;
    /**
     * @var string 业务标示 0:银行发起 1:渠道入金异步通知 O：渠道线下入金
     */
    protected $trsflag;
    /**
     * @var string 交易结果: 1 成功 2 失败
     */
    protected $state;
    /**
     * @var string 交易成功/失败时间(渠道通知时间) 出金时指交易成功时间，不 是到账时间 格式:YYYYMMDDHH24MISS
     */
    protected $resttime;
    /**
     * @var string  失败原因
     */
    protected $opion;
    /**
     * @var string 终端商户号
     */
    protected $merchantid;
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
        parent::process($message, $signature);
        if ($this->noticeData) {
            $node = ArrayUtil::get('CltAcc', $this->noticeData);
            $this->sb = ArrayUtil::get('SubNo', $node);
        }
    }
}