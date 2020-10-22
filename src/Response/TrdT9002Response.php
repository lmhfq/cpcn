<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT9002Response extends TrdBaseResponse
{
    protected $talpag;
    protected $curpag;
    protected $talrcd;
    protected $quyda_dte;
    protected $quyda_tme;
    protected $quyda_subno;
    protected $quyda_cltnm;
    protected $quyda_tye;
    protected $quyda_aclamt;
    protected $quyda_feeamt;
    protected $quyda_ptnsrl;
    protected $quyda_platsrl;
    protected $quyda_usage;
    protected $quyda_paytype;
    protected $quyda_secpaytype;
    protected $quyda_trsflag;
    protected $quyda_state;
    protected $quyda_merchantid;
    protected $quyda_resttime;
    protected $quyda_ccycd;
    protected $quyda_bkid;
    protected $quyda_accno;
    protected $quyda_accnm;
    protected $quyda_openbkcd;
    protected $quyda_openbknm;
    protected $quyda_dremark1;
    protected $quyda_dremark2;
    protected $quyda_dremark3;
    protected $quyda_dremark4;
    protected $quyda_dremark5;
    protected $quyda_dremark6;

    /**
     * @return mixed
     */
    public function getTalpag()
    {
        return $this->talpag;
    }

    /**
     * @param mixed $talpag
     */
    public function setTalpag($talpag): void
    {
        $this->talpag = $talpag;
    }

    /**
     * @return mixed
     */
    public function getCurpag()
    {
        return $this->curpag;
    }

    /**
     * @param mixed $curpag
     */
    public function setCurpag($curpag): void
    {
        $this->curpag = $curpag;
    }

    /**
     * @return mixed
     */
    public function getTalrcd()
    {
        return $this->talrcd;
    }

    /**
     * @param mixed $talrcd
     */
    public function setTalrcd($talrcd): void
    {
        $this->talrcd = $talrcd;
    }

    /**
     * @return mixed
     */
    public function getQuydaDte()
    {
        return $this->quyda_dte;
    }

    /**
     * @param mixed $quyda_dte
     */
    public function setQuydaDte($quyda_dte): void
    {
        $this->quyda_dte = $quyda_dte;
    }

    /**
     * @return mixed
     */
    public function getQuydaTme()
    {
        return $this->quyda_tme;
    }

    /**
     * @param mixed $quyda_tme
     */
    public function setQuydaTme($quyda_tme): void
    {
        $this->quyda_tme = $quyda_tme;
    }

    /**
     * @return mixed
     */
    public function getQuydaSubno()
    {
        return $this->quyda_subno;
    }

    /**
     * @param mixed $quyda_subno
     */
    public function setQuydaSubno($quyda_subno): void
    {
        $this->quyda_subno = $quyda_subno;
    }

    /**
     * @return mixed
     */
    public function getQuydaCltnm()
    {
        return $this->quyda_cltnm;
    }

    /**
     * @param mixed $quyda_cltnm
     */
    public function setQuydaCltnm($quyda_cltnm): void
    {
        $this->quyda_cltnm = $quyda_cltnm;
    }

    /**
     * @return mixed
     */
    public function getQuydaTye()
    {
        return $this->quyda_tye;
    }

    /**
     * @param mixed $quyda_tye
     */
    public function setQuydaTye($quyda_tye): void
    {
        $this->quyda_tye = $quyda_tye;
    }

    /**
     * @return mixed
     */
    public function getQuydaAclamt()
    {
        return $this->quyda_aclamt;
    }

    /**
     * @param mixed $quyda_aclamt
     */
    public function setQuydaAclamt($quyda_aclamt): void
    {
        $this->quyda_aclamt = $quyda_aclamt;
    }

    /**
     * @return mixed
     */
    public function getQuydaFeeamt()
    {
        return $this->quyda_feeamt;
    }

    /**
     * @param mixed $quyda_feeamt
     */
    public function setQuydaFeeamt($quyda_feeamt): void
    {
        $this->quyda_feeamt = $quyda_feeamt;
    }

    /**
     * @return mixed
     */
    public function getQuydaPtnsrl()
    {
        return $this->quyda_ptnsrl;
    }

    /**
     * @param mixed $quyda_ptnsrl
     */
    public function setQuydaPtnsrl($quyda_ptnsrl): void
    {
        $this->quyda_ptnsrl = $quyda_ptnsrl;
    }

    /**
     * @return mixed
     */
    public function getQuydaPlatsrl()
    {
        return $this->quyda_platsrl;
    }

    /**
     * @param mixed $quyda_platsrl
     */
    public function setQuydaPlatsrl($quyda_platsrl): void
    {
        $this->quyda_platsrl = $quyda_platsrl;
    }

    /**
     * @return mixed
     */
    public function getQuydaUsage()
    {
        return $this->quyda_usage;
    }

    /**
     * @param mixed $quyda_usage
     */
    public function setQuydaUsage($quyda_usage): void
    {
        $this->quyda_usage = $quyda_usage;
    }

    /**
     * @return mixed
     */
    public function getQuydaPaytype()
    {
        return $this->quyda_paytype;
    }

    /**
     * @param mixed $quyda_paytype
     */
    public function setQuydaPaytype($quyda_paytype): void
    {
        $this->quyda_paytype = $quyda_paytype;
    }

    /**
     * @return mixed
     */
    public function getQuydaSecpaytype()
    {
        return $this->quyda_secpaytype;
    }

    /**
     * @param mixed $quyda_secpaytype
     */
    public function setQuydaSecpaytype($quyda_secpaytype): void
    {
        $this->quyda_secpaytype = $quyda_secpaytype;
    }

    /**
     * @return mixed
     */
    public function getQuydaTrsflag()
    {
        return $this->quyda_trsflag;
    }

    /**
     * @param mixed $quyda_trsflag
     */
    public function setQuydaTrsflag($quyda_trsflag): void
    {
        $this->quyda_trsflag = $quyda_trsflag;
    }

    /**
     * @return mixed
     */
    public function getQuydaState()
    {
        return $this->quyda_state;
    }

    /**
     * @param mixed $quyda_state
     */
    public function setQuydaState($quyda_state): void
    {
        $this->quyda_state = $quyda_state;
    }

    /**
     * @return mixed
     */
    public function getQuydaMerchantid()
    {
        return $this->quyda_merchantid;
    }

    /**
     * @param mixed $quyda_merchantid
     */
    public function setQuydaMerchantid($quyda_merchantid): void
    {
        $this->quyda_merchantid = $quyda_merchantid;
    }

    /**
     * @return mixed
     */
    public function getQuydaResttime()
    {
        return $this->quyda_resttime;
    }

    /**
     * @param mixed $quyda_resttime
     */
    public function setQuydaResttime($quyda_resttime): void
    {
        $this->quyda_resttime = $quyda_resttime;
    }

    /**
     * @return mixed
     */
    public function getQuydaCcycd()
    {
        return $this->quyda_ccycd;
    }

    /**
     * @param mixed $quyda_ccycd
     */
    public function setQuydaCcycd($quyda_ccycd): void
    {
        $this->quyda_ccycd = $quyda_ccycd;
    }

    /**
     * @return mixed
     */
    public function getQuydaBkid()
    {
        return $this->quyda_bkid;
    }

    /**
     * @param mixed $quyda_bkid
     */
    public function setQuydaBkid($quyda_bkid): void
    {
        $this->quyda_bkid = $quyda_bkid;
    }

    /**
     * @return mixed
     */
    public function getQuydaAccno()
    {
        return $this->quyda_accno;
    }

    /**
     * @param mixed $quyda_accno
     */
    public function setQuydaAccno($quyda_accno): void
    {
        $this->quyda_accno = $quyda_accno;
    }

    /**
     * @return mixed
     */
    public function getQuydaAccnm()
    {
        return $this->quyda_accnm;
    }

    /**
     * @param mixed $quyda_accnm
     */
    public function setQuydaAccnm($quyda_accnm): void
    {
        $this->quyda_accnm = $quyda_accnm;
    }

    /**
     * @return mixed
     */
    public function getQuydaOpenbkcd()
    {
        return $this->quyda_openbkcd;
    }

    /**
     * @param mixed $quyda_openbkcd
     */
    public function setQuydaOpenbkcd($quyda_openbkcd): void
    {
        $this->quyda_openbkcd = $quyda_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getQuydaOpenbknm()
    {
        return $this->quyda_openbknm;
    }

    /**
     * @param mixed $quyda_openbknm
     */
    public function setQuydaOpenbknm($quyda_openbknm): void
    {
        $this->quyda_openbknm = $quyda_openbknm;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark1()
    {
        return $this->quyda_dremark1;
    }

    /**
     * @param mixed $quyda_dremark1
     */
    public function setQuydaDremark1($quyda_dremark1): void
    {
        $this->quyda_dremark1 = $quyda_dremark1;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark2()
    {
        return $this->quyda_dremark2;
    }

    /**
     * @param mixed $quyda_dremark2
     */
    public function setQuydaDremark2($quyda_dremark2): void
    {
        $this->quyda_dremark2 = $quyda_dremark2;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark3()
    {
        return $this->quyda_dremark3;
    }

    /**
     * @param mixed $quyda_dremark3
     */
    public function setQuydaDremark3($quyda_dremark3): void
    {
        $this->quyda_dremark3 = $quyda_dremark3;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark4()
    {
        return $this->quyda_dremark4;
    }

    /**
     * @param mixed $quyda_dremark4
     */
    public function setQuydaDremark4($quyda_dremark4): void
    {
        $this->quyda_dremark4 = $quyda_dremark4;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark5()
    {
        return $this->quyda_dremark5;
    }

    /**
     * @param mixed $quyda_dremark5
     */
    public function setQuydaDremark5($quyda_dremark5): void
    {
        $this->quyda_dremark5 = $quyda_dremark5;
    }

    /**
     * @return mixed
     */
    public function getQuydaDremark6()
    {
        return $this->quyda_dremark6;
    }

    /**
     * @param mixed $quyda_dremark6
     */
    public function setQuydaDremark6($quyda_dremark6): void
    {
        $this->quyda_dremark6 = $quyda_dremark6;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->talpag = ArrayUtil::get('TalPag', $this->responseData);
            $this->curpag = ArrayUtil::get('CurPag', $this->responseData);
            $this->talrcd = ArrayUtil::get('TalRcd', $this->responseData);
            $quyDa = ArrayUtil::get('QuyDa', $this->responseData, []);
            if ($quyDa) {
                $this->quyda_dte = ArrayUtil::get('dte', $quyDa);
                $this->quyda_tme = ArrayUtil::get('tme', $quyDa);
                $this->quyda_subno = ArrayUtil::get('SubNo', $quyDa);
                $this->quyda_cltnm = ArrayUtil::get('CltNm', $quyDa);
                $this->quyda_tye = ArrayUtil::get('tye', $quyDa);
                $this->quyda_aclamt = ArrayUtil::get('AclAmt', $quyDa);
                $this->quyda_feeamt = ArrayUtil::get('FeeAmt', $quyDa);
                $this->quyda_ptnsrl = ArrayUtil::get('PtnSrl', $quyDa);
                $this->quyda_platsrl = ArrayUtil::get('PlatSrl', $quyDa);
                $this->quyda_usage = ArrayUtil::get('Usage', $quyDa);
                $this->quyda_paytype = ArrayUtil::get('PayType', $quyDa);
                $this->quyda_secpaytype = ArrayUtil::get('SecPayType', $quyDa);
                $this->quyda_trsflag = ArrayUtil::get('TrsFlag', $quyDa);
                $this->quyda_state = ArrayUtil::get('State', $quyDa);
                $this->quyda_merchantid = ArrayUtil::get('MerchantId', $quyDa);
                $this->quyda_resttime = ArrayUtil::get('RestTime', $quyDa);
                $this->quyda_ccycd = ArrayUtil::get('CcyCd', $quyDa);
                $this->quyda_bkid = ArrayUtil::get('BkId', $quyDa);
                $this->quyda_accno = ArrayUtil::get('AccNo', $quyDa);
                $this->quyda_accnm = ArrayUtil::get('AccNm', $quyDa);
                $this->quyda_openbkcd = ArrayUtil::get('OpenBkCd', $quyDa);
                $this->quyda_openbknm = ArrayUtil::get('OpenBkNm', $quyDa);
                $this->quyda_dremark1 = ArrayUtil::get('DRemark1', $quyDa);
                $this->quyda_dremark2 = ArrayUtil::get('DRemark2', $quyDa);
                $this->quyda_dremark3 = ArrayUtil::get('DRemark3', $quyDa);
                $this->quyda_dremark4 = ArrayUtil::get('DRemark4', $quyDa);
                $this->quyda_dremark5 = ArrayUtil::get('DRemark5', $quyDa);
                $this->quyda_dremark6 = ArrayUtil::get('DRemark6', $quyDa);
            }
        }
    }
}