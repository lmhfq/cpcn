<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:28
 */

namespace Lmh\Cpcn\Notify;


use Lmh\Cpcn\Exception\InvalidConfigException;
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
     * @var string 户名
     */
    protected $cltacc_cltno;
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
    /**
     * @var string
     */
    protected $srl_srcptnsrl;

    /**
     * @return string
     */
    public function getCltaccSubno(): string
    {
        return $this->cltacc_subno;
    }

    /**
     * @param string $cltacc_subno
     */
    public function setCltaccSubno(string $cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @return string
     */
    public function getCltaccCltnm(): string
    {
        return $this->cltacc_cltnm;
    }

    /**
     * @param string $cltacc_cltnm
     */
    public function setCltaccCltnm(string $cltacc_cltnm): void
    {
        $this->cltacc_cltnm = $cltacc_cltnm;
    }

    /**
     * @return string
     */
    public function getCltaccCltno(): string
    {
        return $this->cltacc_cltno;
    }

    /**
     * @param string $cltacc_cltno
     */
    public function setCltaccCltno(string $cltacc_cltno): void
    {
        $this->cltacc_cltno = $cltacc_cltno;
    }

    /**
     * @return string
     */
    public function getBkaccBkid(): string
    {
        return $this->bkacc_bkid;
    }

    /**
     * @param string $bkacc_bkid
     */
    public function setBkaccBkid(string $bkacc_bkid): void
    {
        $this->bkacc_bkid = $bkacc_bkid;
    }

    /**
     * @return string
     */
    public function getBkaccAccno(): string
    {
        return $this->bkacc_accno;
    }

    /**
     * @param string $bkacc_accno
     */
    public function setBkaccAccno(string $bkacc_accno): void
    {
        $this->bkacc_accno = $bkacc_accno;
    }

    /**
     * @return string
     */
    public function getBkaccAccnm(): string
    {
        return $this->bkacc_accnm;
    }

    /**
     * @param string $bkacc_accnm
     */
    public function setBkaccAccnm(string $bkacc_accnm): void
    {
        $this->bkacc_accnm = $bkacc_accnm;
    }

    /**
     * @return string
     */
    public function getBkaccOpenbkcd(): string
    {
        return $this->bkacc_openbkcd;
    }

    /**
     * @param string $bkacc_openbkcd
     */
    public function setBkaccOpenbkcd(string $bkacc_openbkcd): void
    {
        $this->bkacc_openbkcd = $bkacc_openbkcd;
    }

    /**
     * @return string
     */
    public function getBkaccOpenbknm(): string
    {
        return $this->bkacc_openbknm;
    }

    /**
     * @param string $bkacc_openbknm
     */
    public function setBkaccOpenbknm(string $bkacc_openbknm): void
    {
        $this->bkacc_openbknm = $bkacc_openbknm;
    }

    /**
     * @return int
     */
    public function getAmtAclamt(): int
    {
        return $this->amt_aclamt;
    }

    /**
     * @param int $amt_aclamt
     */
    public function setAmtAclamt(int $amt_aclamt): void
    {
        $this->amt_aclamt = $amt_aclamt;
    }

    /**
     * @return string
     */
    public function getAmtFeeamt(): string
    {
        return $this->amt_feeamt;
    }

    /**
     * @param string $amt_feeamt
     */
    public function setAmtFeeamt(string $amt_feeamt): void
    {
        $this->amt_feeamt = $amt_feeamt;
    }

    /**
     * @return string
     */
    public function getAmtTamt(): string
    {
        return $this->amt_tamt;
    }

    /**
     * @param string $amt_tamt
     */
    public function setAmtTamt(string $amt_tamt): void
    {
        $this->amt_tamt = $amt_tamt;
    }

    /**
     * @return string
     */
    public function getAmtCcycd(): string
    {
        return $this->amt_ccycd;
    }

    /**
     * @param string $amt_ccycd
     */
    public function setAmtCcycd(string $amt_ccycd): void
    {
        $this->amt_ccycd = $amt_ccycd;
    }

    /**
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @param string $usage
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return string
     */
    public function getUbalsta(): string
    {
        return $this->ubalsta;
    }

    /**
     * @param string $ubalsta
     */
    public function setUbalsta(string $ubalsta): void
    {
        $this->ubalsta = $ubalsta;
    }

    /**
     * @return string
     */
    public function getUbaltim(): string
    {
        return $this->ubaltim;
    }

    /**
     * @param string $ubaltim
     */
    public function setUbaltim(string $ubaltim): void
    {
        $this->ubaltim = $ubaltim;
    }

    /**
     * @return string
     */
    public function getDTrsFlag(): string
    {
        return $this->dTrsFlag;
    }

    /**
     * @param string $dTrsFlag
     */
    public function setDTrsFlag(string $dTrsFlag): void
    {
        $this->dTrsFlag = $dTrsFlag;
    }

    /**
     * @return string
     */
    public function getTrsflag(): string
    {
        return $this->trsflag;
    }

    /**
     * @param string $trsflag
     */
    public function setTrsflag(string $trsflag): void
    {
        $this->trsflag = $trsflag;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getResttime(): string
    {
        return $this->resttime;
    }

    /**
     * @param string $resttime
     */
    public function setResttime(string $resttime): void
    {
        $this->resttime = $resttime;
    }

    /**
     * @return string
     */
    public function getOpion(): string
    {
        return $this->opion;
    }

    /**
     * @param string $opion
     */
    public function setOpion(string $opion): void
    {
        $this->opion = $opion;
    }

    /**
     * @return string
     */
    public function getMerchantid(): string
    {
        return $this->merchantid;
    }

    /**
     * @param string $merchantid
     */
    public function setMerchantid(string $merchantid): void
    {
        $this->merchantid = $merchantid;
    }

    /**
     * @return string
     */
    public function getFdate(): string
    {
        return $this->fdate;
    }

    /**
     * @param string $fdate
     */
    public function setFdate(string $fdate): void
    {
        $this->fdate = $fdate;
    }

    /**
     * @return string
     */
    public function getFtime(): string
    {
        return $this->ftime;
    }

    /**
     * @param string $ftime
     */
    public function setFtime(string $ftime): void
    {
        $this->ftime = $ftime;
    }

    /**
     * @return string
     */
    public function getSrlSrcptnsrl(): string
    {
        return $this->srl_srcptnsrl;
    }

    /**
     * @param string $srl_srcptnsrl
     */
    public function setSrlSrcptnsrl(string $srl_srcptnsrl): void
    {
        $this->srl_srcptnsrl = $srl_srcptnsrl;
    }

    /**
     * @param string $message
     * @param string $signature
     * @throws InvalidConfigException
     */
    public function handle(string $message, string $signature)
    {
        parent::process($message, $signature);
        if ($this->noticeData) {
            $this->srl_srcptnsrl = ArrayUtil::get('SrcPtnSrl', $this->noticeData);

            $cltAcc = ArrayUtil::get('CltAcc', $this->noticeData);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $this->cltacc_cltno = ArrayUtil::get('CltNo', $cltAcc);

            $this->state = ArrayUtil::get('State', $this->noticeData);
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->noticeData);
            $this->usage = ArrayUtil::get('Usage', $this->noticeData);
            $this->resttime = ArrayUtil::get('RestTime', $this->noticeData);
            $this->fdate = ArrayUtil::get('FDate', $this->noticeData);
            $this->ftime = ArrayUtil::get('FTime', $this->noticeData);
            $this->merchantid = ArrayUtil::get('MerchantId', $this->noticeData);
            $this->dTrsFlag = ArrayUtil::get('DTrsFlag', $this->noticeData);
            $this->opion = ArrayUtil::get('Opion', $this->noticeData);

            $amt = ArrayUtil::get('Amt', $this->noticeData);
            $this->amt_tamt = ArrayUtil::get('AclAmt', $amt);
            $this->amt_feeamt = ArrayUtil::get('FeeAmt', $amt);
            $this->amt_tamt = ArrayUtil::get('TAmt', $amt);
            $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
        }
    }
}