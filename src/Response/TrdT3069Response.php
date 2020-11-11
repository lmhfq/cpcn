<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT3069Response extends TrdBaseResponse
{

    protected $cltacc_subno;
    protected $cltacc_cltnm;
    protected $amt_aclamt;
    protected $amt_ccycd;
    protected $billinfo_rsubno;
    protected $billinfo_rcltnm;
    protected $billinfo_billno;
    protected $billinfo_orderno;
    protected $billinfo_billamt;
    protected $billinfo_aclamt;
    protected $billinfo_payfee;
    protected $billinfo_payeefee;
    protected $billinfo_ccycd;
    protected $billinfo_paytype;
    protected $billinfo_secpaytype;
    protected $trsflag;
    protected $merchantid;
    protected $state;
    protected $resttime;
    protected $opion;
    protected $usage;
    protected $fdate;
    protected $ftime;
    protected $spec1;
    protected $spec2;

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
    public function getBillinfoRsubno()
    {
        return $this->billinfo_rsubno;
    }

    /**
     * @param mixed $billinfo_rsubno
     */
    public function setBillinfoRsubno($billinfo_rsubno): void
    {
        $this->billinfo_rsubno = $billinfo_rsubno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoRcltnm()
    {
        return $this->billinfo_rcltnm;
    }

    /**
     * @param mixed $billinfo_rcltnm
     */
    public function setBillinfoRcltnm($billinfo_rcltnm): void
    {
        $this->billinfo_rcltnm = $billinfo_rcltnm;
    }

    /**
     * @return mixed
     */
    public function getBillinfoBillno()
    {
        return $this->billinfo_billno;
    }

    /**
     * @param mixed $billinfo_billno
     */
    public function setBillinfoBillno($billinfo_billno): void
    {
        $this->billinfo_billno = $billinfo_billno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoOrderno()
    {
        return $this->billinfo_orderno;
    }

    /**
     * @param mixed $billinfo_orderno
     */
    public function setBillinfoOrderno($billinfo_orderno): void
    {
        $this->billinfo_orderno = $billinfo_orderno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoBillamt()
    {
        return $this->billinfo_billamt;
    }

    /**
     * @param mixed $billinfo_billamt
     */
    public function setBillinfoBillamt($billinfo_billamt): void
    {
        $this->billinfo_billamt = $billinfo_billamt;
    }

    /**
     * @return mixed
     */
    public function getBillinfoAclamt()
    {
        return $this->billinfo_aclamt;
    }

    /**
     * @param mixed $billinfo_aclamt
     */
    public function setBillinfoAclamt($billinfo_aclamt): void
    {
        $this->billinfo_aclamt = $billinfo_aclamt;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPayfee()
    {
        return $this->billinfo_payfee;
    }

    /**
     * @param mixed $billinfo_payfee
     */
    public function setBillinfoPayfee($billinfo_payfee): void
    {
        $this->billinfo_payfee = $billinfo_payfee;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPayeefee()
    {
        return $this->billinfo_payeefee;
    }

    /**
     * @param mixed $billinfo_payeefee
     */
    public function setBillinfoPayeefee($billinfo_payeefee): void
    {
        $this->billinfo_payeefee = $billinfo_payeefee;
    }

    /**
     * @return mixed
     */
    public function getBillinfoCcycd()
    {
        return $this->billinfo_ccycd;
    }

    /**
     * @param mixed $billinfo_ccycd
     */
    public function setBillinfoCcycd($billinfo_ccycd): void
    {
        $this->billinfo_ccycd = $billinfo_ccycd;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPaytype()
    {
        return $this->billinfo_paytype;
    }

    /**
     * @param mixed $billinfo_paytype
     */
    public function setBillinfoPaytype($billinfo_paytype): void
    {
        $this->billinfo_paytype = $billinfo_paytype;
    }

    /**
     * @return mixed
     */
    public function getBillinfoSecpaytype()
    {
        return $this->billinfo_secpaytype;
    }

    /**
     * @param mixed $billinfo_secpaytype
     */
    public function setBillinfoSecpaytype($billinfo_secpaytype): void
    {
        $this->billinfo_secpaytype = $billinfo_secpaytype;
    }

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
    public function getMerchantid()
    {
        return $this->merchantid;
    }

    /**
     * @param mixed $merchantid
     */
    public function setMerchantid($merchantid): void
    {
        $this->merchantid = $merchantid;
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
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData, []);
            if ($cltAcc) {
                $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
                $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            }
            $amt = ArrayUtil::get('Amt', $this->responseData, []);
            if ($amt) {
                $this->amt_aclamt = ArrayUtil::get('AclAmt', $amt);
                $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
            }
            $billInfo = ArrayUtil::get('billInfo', $this->responseData, []);
            if ($billInfo) {
                $this->billinfo_rsubno = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_rcltnm = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_billno = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_orderno = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_billamt = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_aclamt = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_payfee = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_payeefee = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_ccycd = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_paytype = ArrayUtil::get('AcctCd', $billInfo);
                $this->billinfo_secpaytype = ArrayUtil::get('AcctCd', $billInfo);
            }
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->responseData);
            $this->merchantid = ArrayUtil::get('MerchantId', $this->responseData);
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->resttime = ArrayUtil::get('RestTime', $this->responseData);
            $this->opion = ArrayUtil::get('Opion', $this->responseData);
            $this->usage = ArrayUtil::get('Usage', $this->responseData);
            $this->fdate = ArrayUtil::get('FDate', $this->responseData);
            $this->ftime = ArrayUtil::get('FTime', $this->responseData);
            $this->spec1 = ArrayUtil::get('Spec1', $this->responseData);
            $this->spec2 = ArrayUtil::get('Spec2', $this->responseData);
        }
    }
}