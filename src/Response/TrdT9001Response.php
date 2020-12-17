<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT9001Response extends TrdBaseResponse
{
    protected $talpag;
    protected $curpag;
    protected $talrcd;
    protected $quyda_dte;
    protected $quyda_tme;
    protected $quyda_cltno;
    protected $quyda_subno;
    protected $quyda_cltnm;
    protected $quyda_tye;
    protected $quyda_ptnsrl;
    protected $quyda_platsrl;

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
    public function getQuydaCltno()
    {
        return $this->quyda_cltno;
    }

    /**
     * @param mixed $quyda_cltno
     */
    public function setQuydaCltno($quyda_cltno): void
    {
        $this->quyda_cltno = $quyda_cltno;
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
                $this->quyda_cltno = ArrayUtil::get('CltNo', $quyDa);
                $this->quyda_subno = ArrayUtil::get('SubNo', $quyDa);
                $this->quyda_cltnm = ArrayUtil::get('CltNm', $quyDa);
                $this->quyda_tye = ArrayUtil::get('tye', $quyDa);
                $this->quyda_ptnsrl = ArrayUtil::get('PtnSrl', $quyDa);
                $this->quyda_platsrl = ArrayUtil::get('PlatSrl', $quyDa);
            }
        }
    }
}