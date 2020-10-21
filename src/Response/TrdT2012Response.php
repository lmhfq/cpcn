<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT2012Response extends TrdBaseResponse
{
    protected $cltacc_subno;
    protected $cltacc_cltnm;
    protected $amt_aclamt;
    protected $amt_feeamt;
    protected $amt_ccycd;

    /**
     * @return mixed
     */
    public function getCltaccSubno()
    {
        return $this->cltacc_subno;
    }

    /**
     * @param mixed $cltacc_subno
     */
    public function setCltaccSubno($cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @return mixed
     */
    public function getCltaccCltnm()
    {
        return $this->cltacc_cltnm;
    }

    /**
     * @param mixed $cltacc_cltnm
     */
    public function setCltaccCltnm($cltacc_cltnm): void
    {
        $this->cltacc_cltnm = $cltacc_cltnm;
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
    public function getAmtFeeamt()
    {
        return $this->amt_feeamt;
    }

    /**
     * @param mixed $amt_feeamt
     */
    public function setAmtFeeamt($amt_feeamt): void
    {
        $this->amt_feeamt = $amt_feeamt;
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
    public function getCltaccAcctcd()
    {
        return $this->cltacc_acctcd;
    }

    /**
     * @param mixed $cltacc_acctcd
     */
    public function setCltaccAcctcd($cltacc_acctcd): void
    {
        $this->cltacc_acctcd = $cltacc_acctcd;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getActideadline()
    {
        return $this->actideadline;
    }

    /**
     * @param mixed $actideadline
     */
    public function setActideadline($actideadline): void
    {
        $this->actideadline = $actideadline;
    }

    /**
     * @return mixed
     */
    public function getActiinfo()
    {
        return $this->actiinfo;
    }

    /**
     * @param mixed $actiinfo
     */
    public function setActiinfo($actiinfo): void
    {
        $this->actiinfo = $actiinfo;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData, []);
            if ($cltAcc) {
                $this->cltacc_cltno = ArrayUtil::get('CltNo', $cltAcc);
                $this->cltacc_cltpid = ArrayUtil::get('CltPid', $cltAcc);
                $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
                $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
                $this->cltacc_bnkeid = ArrayUtil::get('BnkEid', $cltAcc);
                $this->cltacc_openbkcd = ArrayUtil::get('OpenBkCd', $cltAcc);
                $this->cltacc_openbknm = ArrayUtil::get('OpenBkNm', $cltAcc);
                $this->cltacc_acctcd = ArrayUtil::get('AcctCd', $cltAcc);
            }
            $this->amount = ArrayUtil::get('Amount', $this->responseData);
            $this->actideadline = ArrayUtil::get('ActiDeadline', $this->responseData);
            $this->actiinfo = ArrayUtil::get('ActiInfo', $this->responseData);
        }
    }
}