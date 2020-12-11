<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:55
 */

namespace Lmh\Cpcn\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class NtcT4042Request extends NtcBaseRequest
{
    /**
     * @var string 业务标示 A00 普通退款
     */
    protected $trsflag;
    /**
     * @var string 原交易标志 ENTRCV:收款业务
     */
    protected $dtrcd;
    /**
     * @var string 原交易的合作方交易流水号
     */
    protected $dptnsrl;
    /**
     * @var string 退款原因
     */
    protected $usage;
    /**
     * @var int 退款金额
     */
    protected $amt_aclamt;
    /**
     * @var string 付款方手续费
     */
    protected $amt_payfee;
    /**
     * @var string 收款方手续费
     */
    protected $amt_payeefee;
    /**
     * @var string
     */
    protected $amt_ccycd;
    /**
     * @var string 退款结果 1 退款成功 2 退款失败
     */
    protected $state;
    /**
     * @var string 退款成功/失败时间(渠道通 知时间) 格式:YYYYMMDDHH24MISS
     */
    protected $resttime;
    /**
     * @var string  失败原因
     */
    protected $opion;
    /**
     * @var string 原退款交易日期
     */
    protected $fdate;
    /**
     * @var string 原退款交易时间
     */
    protected $ftime;

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
    public function getDtrcd(): string
    {
        return $this->dtrcd;
    }

    /**
     * @param string $dtrcd
     */
    public function setDtrcd(string $dtrcd): void
    {
        $this->dtrcd = $dtrcd;
    }

    /**
     * @return string
     */
    public function getDptnsrl(): string
    {
        return $this->dptnsrl;
    }

    /**
     * @param string $dptnsrl
     */
    public function setDptnsrl(string $dptnsrl): void
    {
        $this->dptnsrl = $dptnsrl;
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
    public function getAmtPayfee(): string
    {
        return $this->amt_payfee;
    }

    /**
     * @param string $amt_payfee
     */
    public function setAmtPayfee(string $amt_payfee): void
    {
        $this->amt_payfee = $amt_payfee;
    }

    /**
     * @return string
     */
    public function getAmtPayeefee(): string
    {
        return $this->amt_payeefee;
    }

    /**
     * @param string $amt_payeefee
     */
    public function setAmtPayeefee(string $amt_payeefee): void
    {
        $this->amt_payeefee = $amt_payeefee;
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


    public function handle(string $message, string $signature)
    {
        parent::process($message, $signature);
        if ($this->noticeData) {

            $this->state = ArrayUtil::get('State', $this->noticeData);
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->noticeData);
            $this->dtrcd = ArrayUtil::get('DTrCd', $this->noticeData);
            $this->usage = ArrayUtil::get('Usage', $this->noticeData);
            $this->resttime = ArrayUtil::get('RestTime', $this->noticeData);
            $this->fdate = ArrayUtil::get('FDate', $this->noticeData);
            $this->ftime = ArrayUtil::get('FTime', $this->noticeData);
            $this->dptnsrl = ArrayUtil::get('DPtnSrl', $this->noticeData);
            $this->opion = ArrayUtil::get('Opion', $this->noticeData);

            $amt = ArrayUtil::get('Amt', $this->noticeData);
            $this->amt_aclamt = ArrayUtil::get('AclAmt', $amt);
            $this->amt_payfee = ArrayUtil::get('PayFee', $amt);
            $this->amt_payeefee = ArrayUtil::get('PayeeFee', $amt);
            $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
        }

    }
}