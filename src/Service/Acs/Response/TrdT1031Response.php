<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT1031Response extends TrdBaseResponse
{
    protected $cltacc_cltno;
    protected $cltacc_cltpid;
    protected $cltacc_subno;
    protected $cltacc_cltnm;
    protected $cltacc_bnkeid;
    protected $cltacc_openbkcd;
    protected $cltacc_openbknm;
    protected $cltacc_acctcd;
    protected $amount;
    protected $actideadline;
    protected $actiinfo;

    /**
     * @return mixed
     */
    public function getCltaccCltno()
    {
        return $this->cltacc_cltno;
    }

    /**
     * @param mixed $cltacc_cltno
     */
    public function setCltaccCltno($cltacc_cltno): void
    {
        $this->cltacc_cltno = $cltacc_cltno;
    }

    /**
     * @return mixed
     */
    public function getCltaccCltpid()
    {
        return $this->cltacc_cltpid;
    }

    /**
     * @param mixed $cltacc_cltpid
     */
    public function setCltaccCltpid($cltacc_cltpid): void
    {
        $this->cltacc_cltpid = $cltacc_cltpid;
    }

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
    public function getCltaccBnkeid()
    {
        return $this->cltacc_bnkeid;
    }

    /**
     * @param mixed $cltacc_bnkeid
     */
    public function setCltaccBnkeid($cltacc_bnkeid): void
    {
        $this->cltacc_bnkeid = $cltacc_bnkeid;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbkcd()
    {
        return $this->cltacc_openbkcd;
    }

    /**
     * @param mixed $cltacc_openbkcd
     */
    public function setCltaccOpenbkcd($cltacc_openbkcd): void
    {
        $this->cltacc_openbkcd = $cltacc_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbknm()
    {
        return $this->cltacc_openbknm;
    }

    /**
     * @param mixed $cltacc_openbknm
     */
    public function setCltaccOpenbknm($cltacc_openbknm): void
    {
        $this->cltacc_openbknm = $cltacc_openbknm;
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
            $this->cltacc_cltno = ArrayUtil::get('CltNo', $cltAcc);
            $this->cltacc_cltpid = ArrayUtil::get('CltPid', $cltAcc);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $this->cltacc_bnkeid = ArrayUtil::get('BnkEid', $cltAcc);
            $this->cltacc_openbkcd = ArrayUtil::get('OpenBkCd', $cltAcc);
            $this->cltacc_openbknm = ArrayUtil::get('OpenBkNm', $cltAcc);
            $this->cltacc_acctcd = ArrayUtil::get('AcctCd', $cltAcc);
            $this->amount = ArrayUtil::get('Amount', $this->responseData);
            $this->actideadline = ArrayUtil::get('ActiDeadline', $this->responseData);
            $this->actiinfo = ArrayUtil::get('ActiInfo', $this->responseData);
        }
    }
}