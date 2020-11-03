<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1001Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1001";

    public $cltacc_cltno;

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $clt_kd;

    public $clt_nm;

    public $clt_cdtp;

    public $clt_cdno;

    public $clt_uscid;

    public $clt_orgcd;

    public $clt_bslic;

    public $clt_swdjh;

    public $clt_mobno;

    public $clt_email;

    public $clt_postno;

    public $clt_addr;

    public $oper_nm;

    public $oper_cdno;

    public $oper_mobno;

    public $fcflg;

    public $acctp;

    public $hxsubno;

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
    public function getCltKd()
    {
        return $this->clt_kd;
    }

    /**
     * @param mixed $clt_kd
     */
    public function setCltKd($clt_kd): void
    {
        $this->clt_kd = $clt_kd;
    }

    /**
     * @return mixed
     */
    public function getCltNm()
    {
        return $this->clt_nm;
    }

    /**
     * @param mixed $clt_nm
     */
    public function setCltNm($clt_nm): void
    {
        $this->clt_nm = $clt_nm;
    }

    /**
     * @return mixed
     */
    public function getCltCdtp()
    {
        return $this->clt_cdtp;
    }

    /**
     * @param mixed $clt_cdtp
     */
    public function setCltCdtp($clt_cdtp): void
    {
        $this->clt_cdtp = $clt_cdtp;
    }

    /**
     * @return mixed
     */
    public function getCltCdno()
    {
        return $this->clt_cdno;
    }

    /**
     * @param mixed $clt_cdno
     */
    public function setCltCdno($clt_cdno): void
    {
        $this->clt_cdno = $clt_cdno;
    }

    /**
     * @return mixed
     */
    public function getCltUscid()
    {
        return $this->clt_uscid;
    }

    /**
     * @param mixed $clt_uscid
     */
    public function setCltUscid($clt_uscid): void
    {
        $this->clt_uscid = $clt_uscid;
    }

    /**
     * @return mixed
     */
    public function getCltOrgcd()
    {
        return $this->clt_orgcd;
    }

    /**
     * @param mixed $clt_orgcd
     */
    public function setCltOrgcd($clt_orgcd): void
    {
        $this->clt_orgcd = $clt_orgcd;
    }

    /**
     * @return mixed
     */
    public function getCltBslic()
    {
        return $this->clt_bslic;
    }

    /**
     * @param mixed $clt_bslic
     */
    public function setCltBslic($clt_bslic): void
    {
        $this->clt_bslic = $clt_bslic;
    }

    /**
     * @return mixed
     */
    public function getCltSwdjh()
    {
        return $this->clt_swdjh;
    }

    /**
     * @param mixed $clt_swdjh
     */
    public function setCltSwdjh($clt_swdjh): void
    {
        $this->clt_swdjh = $clt_swdjh;
    }

    /**
     * @return mixed
     */
    public function getCltMobno()
    {
        return $this->clt_mobno;
    }

    /**
     * @param mixed $clt_mobno
     */
    public function setCltMobno($clt_mobno): void
    {
        $this->clt_mobno = $clt_mobno;
    }

    /**
     * @return mixed
     */
    public function getCltEmail()
    {
        return $this->clt_email;
    }

    /**
     * @param mixed $clt_email
     */
    public function setCltEmail($clt_email): void
    {
        $this->clt_email = $clt_email;
    }

    /**
     * @return mixed
     */
    public function getCltPostno()
    {
        return $this->clt_postno;
    }

    /**
     * @param mixed $clt_postno
     */
    public function setCltPostno($clt_postno): void
    {
        $this->clt_postno = $clt_postno;
    }

    /**
     * @return mixed
     */
    public function getCltAddr()
    {
        return $this->clt_addr;
    }

    /**
     * @param mixed $clt_addr
     */
    public function setCltAddr($clt_addr): void
    {
        $this->clt_addr = $clt_addr;
    }

    /**
     * @return mixed
     */
    public function getOperNm()
    {
        return $this->oper_nm;
    }

    /**
     * @param mixed $oper_nm
     */
    public function setOperNm($oper_nm): void
    {
        $this->oper_nm = $oper_nm;
    }

    /**
     * @return mixed
     */
    public function getOperCdno()
    {
        return $this->oper_cdno;
    }

    /**
     * @param mixed $oper_cdno
     */
    public function setOperCdno($oper_cdno): void
    {
        $this->oper_cdno = $oper_cdno;
    }

    /**
     * @return mixed
     */
    public function getOperMobno()
    {
        return $this->oper_mobno;
    }

    /**
     * @param mixed $oper_mobno
     */
    public function setOperMobno($oper_mobno): void
    {
        $this->oper_mobno = $oper_mobno;
    }

    /**
     * @return mixed
     */
    public function getFcflg()
    {
        return $this->fcflg;
    }

    /**
     * @param mixed $fcflg
     */
    public function setFcflg($fcflg): void
    {
        $this->fcflg = $fcflg;
    }

    /**
     * @return mixed
     */
    public function getAcctp()
    {
        return $this->acctp;
    }

    /**
     * @param mixed $acctp
     */
    public function setAcctp($acctp): void
    {
        $this->acctp = $acctp;
    }

    /**
     * @return mixed
     */
    public function getHxsubno()
    {
        return $this->hxsubno;
    }

    /**
     * @param mixed $hxsubno
     */
    public function setHxsubno($hxsubno): void
    {
        $this->hxsubno = $hxsubno;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'CltAcc' => [
                'CltNo' => $this->cltacc_cltno,
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'Clt' => [
                'Kd' => $this->clt_kd,
                'Nm' => $this->clt_nm,
                'CdTp' => $this->clt_cdtp,
                'CdNo' => $this->clt_cdno,
                'UscId' => $this->clt_uscid,
                'OrgCd' => $this->clt_orgcd,
                'BsLic' => $this->clt_bslic,
                'Swdjh' => $this->clt_swdjh,
                'MobNo' => $this->clt_mobno,
                'Email' => $this->clt_email,
                'PostNo' => $this->clt_postno,
                'Addr' => $this->clt_addr,
            ],
            'Oper' => [
                'Nm' => $this->oper_nm,
                'CdNo' => $this->oper_cdno,
                'MobNo' => $this->oper_mobno,
            ],
            'FcFlg' => $this->fcflg,
            'AccTp' => $this->acctp,
            'HxSubNo' => $this->hxsubno,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}