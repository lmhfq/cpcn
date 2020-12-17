<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT9008Response extends TrdBaseResponse
{
    protected $talpag;
    protected $curpag;
    protected $talrcd;
    protected $quyda_dte;
    protected $quyda_tme;
    protected $quyda_mnychgno;
    protected $quyda_subno;
    protected $quyda_tye;
    protected $quyda_rsubno;
    protected $quyda_rcltnm;
    protected $quyda_aclamt;
    protected $quyda_feeamt;
    protected $quyda_balamt;
    protected $quyda_bsitye;
    protected $quyda_bsidsc;
    protected $quyda_dtrdtype;
    protected $quyda_dptnsrl;
    protected $quyda_dplatsrl;
    protected $quyda_usage;
    protected $quyda_ccycd;

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
    public function getQuydaMnychgno()
    {
        return $this->quyda_mnychgno;
    }

    /**
     * @param mixed $quyda_mnychgno
     */
    public function setQuydaMnychgno($quyda_mnychgno): void
    {
        $this->quyda_mnychgno = $quyda_mnychgno;
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
    public function getQuydaRsubno()
    {
        return $this->quyda_rsubno;
    }

    /**
     * @param mixed $quyda_rsubno
     */
    public function setQuydaRsubno($quyda_rsubno): void
    {
        $this->quyda_rsubno = $quyda_rsubno;
    }

    /**
     * @return mixed
     */
    public function getQuydaRcltnm()
    {
        return $this->quyda_rcltnm;
    }

    /**
     * @param mixed $quyda_rcltnm
     */
    public function setQuydaRcltnm($quyda_rcltnm): void
    {
        $this->quyda_rcltnm = $quyda_rcltnm;
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
    public function getQuydaBalamt()
    {
        return $this->quyda_balamt;
    }

    /**
     * @param mixed $quyda_balamt
     */
    public function setQuydaBalamt($quyda_balamt): void
    {
        $this->quyda_balamt = $quyda_balamt;
    }

    /**
     * @return mixed
     */
    public function getQuydaBsitye()
    {
        return $this->quyda_bsitye;
    }

    /**
     * @param mixed $quyda_bsitye
     */
    public function setQuydaBsitye($quyda_bsitye): void
    {
        $this->quyda_bsitye = $quyda_bsitye;
    }

    /**
     * @return mixed
     */
    public function getQuydaBsidsc()
    {
        return $this->quyda_bsidsc;
    }

    /**
     * @param mixed $quyda_bsidsc
     */
    public function setQuydaBsidsc($quyda_bsidsc): void
    {
        $this->quyda_bsidsc = $quyda_bsidsc;
    }

    /**
     * @return mixed
     */
    public function getQuydaDtrdtype()
    {
        return $this->quyda_dtrdtype;
    }

    /**
     * @param mixed $quyda_dtrdtype
     */
    public function setQuydaDtrdtype($quyda_dtrdtype): void
    {
        $this->quyda_dtrdtype = $quyda_dtrdtype;
    }

    /**
     * @return mixed
     */
    public function getQuydaDptnsrl()
    {
        return $this->quyda_dptnsrl;
    }

    /**
     * @param mixed $quyda_dptnsrl
     */
    public function setQuydaDptnsrl($quyda_dptnsrl): void
    {
        $this->quyda_dptnsrl = $quyda_dptnsrl;
    }

    /**
     * @return mixed
     */
    public function getQuydaDplatsrl()
    {
        return $this->quyda_dplatsrl;
    }

    /**
     * @param mixed $quyda_dplatsrl
     */
    public function setQuydaDplatsrl($quyda_dplatsrl): void
    {
        $this->quyda_dplatsrl = $quyda_dplatsrl;
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
                $this->quyda_mnychgno = ArrayUtil::get('mnyChgNo', $quyDa);
                $this->quyda_subno = ArrayUtil::get('SubNo', $quyDa);
                $this->quyda_tye = ArrayUtil::get('tye', $quyDa);
                $this->quyda_rsubno = ArrayUtil::get('RSubNo', $quyDa);
                $this->quyda_cltnm = ArrayUtil::get('CltNm', $quyDa);
                $this->quyda_aclamt = ArrayUtil::get('AclAmt', $quyDa);
                $this->quyda_feeamt = ArrayUtil::get('FeeAmt', $quyDa);
                $this->quyda_balamt = ArrayUtil::get('BalAmt', $quyDa);
                $this->quyda_bsitye = ArrayUtil::get('bsiTye', $quyDa);
                $this->quyda_bsidsc = ArrayUtil::get('bsiDsc', $quyDa);
                $this->quyda_dtrdtype = ArrayUtil::get('DTrdType', $quyDa);
                $this->quyda_dptnsrl = ArrayUtil::get('DPtnSrl', $quyDa);
                $this->quyda_dplatsrl = ArrayUtil::get('DPlatSrl', $quyDa);
                $this->quyda_usage = ArrayUtil::get('Usage', $quyDa);
                $this->quyda_ccycd = ArrayUtil::get('CcyCd', $quyDa);
            }
        }
    }
}