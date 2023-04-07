<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT2012Response extends TrdBaseResponse
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
     * @var int 发生额
     */
    protected $amt_aclamt;
    /**
     * @var string 转账手续费
     */
    protected $amt_feeamt;
    /**
     * @var string
     */
    protected $amt_ccycd;
    /**
     * @var string 交易结果: 1 成功 2 失败 3 处理中 9已冲正
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
     * @var string 业务标示 入金业务时指： A00 正常入金 B00 入金成功后，再冻结资 金出金业务时指： A00 正常出金 B01 解冻资金后，再出金
     */
    protected $trsflag;
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
    public function getAmtAclamt(): string
    {
        return $this->amt_aclamt;
    }

    /**
     * @param string $amt_aclamt
     */
    public function setAmtAclamt(string $amt_aclamt): void
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


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData, []);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $amt = ArrayUtil::get('Amt', $this->responseData, []);
            $this->amt_aclamt = ArrayUtil::get('AclAmt', $amt);
            $this->amt_feeamt = ArrayUtil::get('FeeAmt', $amt);
            $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->resttime = ArrayUtil::get('RestTime', $this->responseData);
            $this->opion = ArrayUtil::get('Opion', $this->responseData);
            $this->ubalsta = ArrayUtil::get('UBalSta', $this->responseData);
            $this->ubaltim = ArrayUtil::get('UBalTim', $this->responseData);
            $this->usage = ArrayUtil::get('Usage', $this->responseData);
            $this->fdate = ArrayUtil::get('FDate', $this->responseData);
            $this->ftime = ArrayUtil::get('FTime', $this->responseData);
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->responseData);
            $this->merchantid = ArrayUtil::get('MerchantId', $this->responseData);
        }
    }
}