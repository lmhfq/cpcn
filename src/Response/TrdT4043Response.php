<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT4043Response extends TrdBaseResponse
{
    protected $trsflag;
    protected $dtrcd;
    protected $dptnsrl;
    protected $usage;
    protected $amt_aclamt;
    protected $amt_payfee;
    protected $amt_payeefee;
    protected $amt_ccycd;
    protected $state;
    protected $resttime;
    protected $opion;
    protected $fdate;
    protected $ftime;
    protected $spec1;
    protected $spec2;

    /**
     * @return mixed
     */
    public function getTrsflag()
    {
        return $this->trsflag;
    }

    /**
     * @param mixed $trsflag
     */
    public function setTrsflag($trsflag): void
    {
        $this->trsflag = $trsflag;
    }

    /**
     * @return mixed
     */
    public function getDtrcd()
    {
        return $this->dtrcd;
    }

    /**
     * @param mixed $dtrcd
     */
    public function setDtrcd($dtrcd): void
    {
        $this->dtrcd = $dtrcd;
    }

    /**
     * @return mixed
     */
    public function getDptnsrl()
    {
        return $this->dptnsrl;
    }

    /**
     * @param mixed $dptnsrl
     */
    public function setDptnsrl($dptnsrl): void
    {
        $this->dptnsrl = $dptnsrl;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return mixed
     */
    public function getAmtAclamt()
    {
        return $this->amt_aclamt;
    }

    /**
     * @param mixed $amt_aclamt
     */
    public function setAmtAclamt($amt_aclamt): void
    {
        $this->amt_aclamt = $amt_aclamt;
    }

    /**
     * @return mixed
     */
    public function getAmtPayfee()
    {
        return $this->amt_payfee;
    }

    /**
     * @param mixed $amt_payfee
     */
    public function setAmtPayfee($amt_payfee): void
    {
        $this->amt_payfee = $amt_payfee;
    }

    /**
     * @return mixed
     */
    public function getAmtPayeefee()
    {
        return $this->amt_payeefee;
    }

    /**
     * @param mixed $amt_payeefee
     */
    public function setAmtPayeefee($amt_payeefee): void
    {
        $this->amt_payeefee = $amt_payeefee;
    }

    /**
     * @return mixed
     */
    public function getAmtCcycd()
    {
        return $this->amt_ccycd;
    }

    /**
     * @param mixed $amt_ccycd
     */
    public function setAmtCcycd($amt_ccycd): void
    {
        $this->amt_ccycd = $amt_ccycd;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getResttime()
    {
        return $this->resttime;
    }

    /**
     * @param mixed $resttime
     */
    public function setResttime($resttime): void
    {
        $this->resttime = $resttime;
    }

    /**
     * @return mixed
     */
    public function getOpion()
    {
        return $this->opion;
    }

    /**
     * @param mixed $opion
     */
    public function setOpion($opion): void
    {
        $this->opion = $opion;
    }

    /**
     * @return mixed
     */
    public function getFdate()
    {
        return $this->fdate;
    }

    /**
     * @param mixed $fdate
     */
    public function setFdate($fdate): void
    {
        $this->fdate = $fdate;
    }

    /**
     * @return mixed
     */
    public function getFtime()
    {
        return $this->ftime;
    }

    /**
     * @param mixed $ftime
     */
    public function setFtime($ftime): void
    {
        $this->ftime = $ftime;
    }

    /**
     * @return mixed
     */
    public function getSpec1()
    {
        return $this->spec1;
    }

    /**
     * @param mixed $spec1
     */
    public function setSpec1($spec1): void
    {
        $this->spec1 = $spec1;
    }

    /**
     * @return mixed
     */
    public function getSpec2()
    {
        return $this->spec2;
    }

    /**
     * @param mixed $spec2
     */
    public function setSpec2($spec2): void
    {
        $this->spec2 = $spec2;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->responseData);
            $this->dtrcd = ArrayUtil::get('DTrCd', $this->responseData);
            $this->dptnsrl = ArrayUtil::get('DPtnSrl', $this->responseData);
            $this->usage = ArrayUtil::get('Usage', $this->responseData);
            $amt = ArrayUtil::get('Amt', $this->responseData, []);
            if ($amt) {
                $this->amt_aclamt = ArrayUtil::get('AclAmt', $amt);
                $this->amt_payfee = ArrayUtil::get('PayFee', $amt);
                $this->amt_payeefee = ArrayUtil::get('PayeeFee', $amt);
                $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
            }
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->resttime = ArrayUtil::get('RestTime', $this->responseData);
            $this->opion = ArrayUtil::get('Opion', $this->responseData);
            $this->fdate = ArrayUtil::get('FDate', $this->responseData);
            $this->ftime = ArrayUtil::get('FTime', $this->responseData);
            $this->spec1 = ArrayUtil::get('Spec1', $this->responseData);
            $this->spec2 = ArrayUtil::get('Spec2', $this->responseData);
        }
    }
}