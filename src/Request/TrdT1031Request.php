<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1031Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1031";

    public $fcflg;

    public $acctp;

    public $cltacc_cltno;

    public $cltacc_cltnm;

    public $clt_kd;

    public $clt_nm;

    public $clt_cdtp;

    public $clt_cdno;

    public $clt_cdisdt;

    public $clt_cdexdt;

    public $clt_uscid;

    public $clt_uscexdt;

    public $clt_orgcd;

    public $clt_bslic;

    public $clt_swdjh;

    public $clt_mobno;

    public $clt_email;

    public $clt_postno;

    public $clt_addr;

    public $clt_citycd;

    public $clt_inducode;

    public $clt_scale;

    public $clt_basicacctno;

    public $clt_authcapital;

    public $clt_busiscope;

    public $oper_nm;

    public $oper_cdno;

    public $oper_mobno;

    public $fleinfo_dtlno;

    public $fleinfo_bsity;

    public $fleinfo_fletheme;

    public $fleinfo_flemeo;

    public $fleinfo_flety;

    public $fleinfo_flenm;

    public $fleinfo_flepth;

    public $fleinfo_flecont;

    public $bkacc_bkid;

    public $bkacc_accno;

    public $bkacc_crdtp;

    public $bkacc_cdtp;

    public $bkacc_cdno;

    public $bkacc_phone;

    public $bkacc_crsmk;

    public $bkacc_openbkcd;

    public $bkacc_openbknm;

    public $bkacc_prccd;

    public $bkacc_prcnm;

    public $bkacc_citycd;

    public $bkacc_citynm;

    public $operator_docuopname;

    public $operator_docuopmobile;

    public $operator_docuopidcard;

    public $operator_checkername;

    public $operator_checkermobile;

    public $operator_checkeridcard;

    public $actiflag;

    public $notificationurl;

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
    public function getCltCdisdt()
    {
        return $this->clt_cdisdt;
    }

    /**
     * @param mixed $clt_cdisdt
     */
    public function setCltCdisdt($clt_cdisdt): void
    {
        $this->clt_cdisdt = $clt_cdisdt;
    }

    /**
     * @return mixed
     */
    public function getCltCdexdt()
    {
        return $this->clt_cdexdt;
    }

    /**
     * @param mixed $clt_cdexdt
     */
    public function setCltCdexdt($clt_cdexdt): void
    {
        $this->clt_cdexdt = $clt_cdexdt;
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
    public function getCltUscexdt()
    {
        return $this->clt_uscexdt;
    }

    /**
     * @param mixed $clt_uscexdt
     */
    public function setCltUscexdt($clt_uscexdt): void
    {
        $this->clt_uscexdt = $clt_uscexdt;
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
    public function getCltCitycd()
    {
        return $this->clt_citycd;
    }

    /**
     * @param mixed $clt_citycd
     */
    public function setCltCitycd($clt_citycd): void
    {
        $this->clt_citycd = $clt_citycd;
    }

    /**
     * @return mixed
     */
    public function getCltInducode()
    {
        return $this->clt_inducode;
    }

    /**
     * @param mixed $clt_inducode
     */
    public function setCltInducode($clt_inducode): void
    {
        $this->clt_inducode = $clt_inducode;
    }

    /**
     * @return mixed
     */
    public function getCltScale()
    {
        return $this->clt_scale;
    }

    /**
     * @param mixed $clt_scale
     */
    public function setCltScale($clt_scale): void
    {
        $this->clt_scale = $clt_scale;
    }

    /**
     * @return mixed
     */
    public function getCltBasicacctno()
    {
        return $this->clt_basicacctno;
    }

    /**
     * @param mixed $clt_basicacctno
     */
    public function setCltBasicacctno($clt_basicacctno): void
    {
        $this->clt_basicacctno = $clt_basicacctno;
    }

    /**
     * @return mixed
     */
    public function getCltAuthcapital()
    {
        return $this->clt_authcapital;
    }

    /**
     * @param mixed $clt_authcapital
     */
    public function setCltAuthcapital($clt_authcapital): void
    {
        $this->clt_authcapital = $clt_authcapital;
    }

    /**
     * @return mixed
     */
    public function getCltBusiscope()
    {
        return $this->clt_busiscope;
    }

    /**
     * @param mixed $clt_busiscope
     */
    public function setCltBusiscope($clt_busiscope): void
    {
        $this->clt_busiscope = $clt_busiscope;
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
    public function getFleinfoDtlno()
    {
        return $this->fleinfo_dtlno;
    }

    /**
     * @param mixed $fleinfo_dtlno
     */
    public function setFleinfoDtlno($fleinfo_dtlno): void
    {
        $this->fleinfo_dtlno = $fleinfo_dtlno;
    }

    /**
     * @return mixed
     */
    public function getFleinfoBsity()
    {
        return $this->fleinfo_bsity;
    }

    /**
     * @param mixed $fleinfo_bsity
     */
    public function setFleinfoBsity($fleinfo_bsity): void
    {
        $this->fleinfo_bsity = $fleinfo_bsity;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFletheme()
    {
        return $this->fleinfo_fletheme;
    }

    /**
     * @param mixed $fleinfo_fletheme
     */
    public function setFleinfoFletheme($fleinfo_fletheme): void
    {
        $this->fleinfo_fletheme = $fleinfo_fletheme;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlemeo()
    {
        return $this->fleinfo_flemeo;
    }

    /**
     * @param mixed $fleinfo_flemeo
     */
    public function setFleinfoFlemeo($fleinfo_flemeo): void
    {
        $this->fleinfo_flemeo = $fleinfo_flemeo;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlety()
    {
        return $this->fleinfo_flety;
    }

    /**
     * @param mixed $fleinfo_flety
     */
    public function setFleinfoFlety($fleinfo_flety): void
    {
        $this->fleinfo_flety = $fleinfo_flety;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlenm()
    {
        return $this->fleinfo_flenm;
    }

    /**
     * @param mixed $fleinfo_flenm
     */
    public function setFleinfoFlenm($fleinfo_flenm): void
    {
        $this->fleinfo_flenm = $fleinfo_flenm;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlepth()
    {
        return $this->fleinfo_flepth;
    }

    /**
     * @param mixed $fleinfo_flepth
     */
    public function setFleinfoFlepth($fleinfo_flepth): void
    {
        $this->fleinfo_flepth = $fleinfo_flepth;
    }

    /**
     * @return mixed
     */
    public function getFleinfoFlecont()
    {
        return $this->fleinfo_flecont;
    }

    /**
     * @param mixed $fleinfo_flecont
     */
    public function setFleinfoFlecont($fleinfo_flecont): void
    {
        $this->fleinfo_flecont = $fleinfo_flecont;
    }

    /**
     * @return mixed
     */
    public function getBkaccBkid()
    {
        return $this->bkacc_bkid;
    }

    /**
     * @param mixed $bkacc_bkid
     */
    public function setBkaccBkid($bkacc_bkid): void
    {
        $this->bkacc_bkid = $bkacc_bkid;
    }

    /**
     * @return mixed
     */
    public function getBkaccAccno()
    {
        return $this->bkacc_accno;
    }

    /**
     * @param mixed $bkacc_accno
     */
    public function setBkaccAccno($bkacc_accno): void
    {
        $this->bkacc_accno = $bkacc_accno;
    }

    /**
     * @return mixed
     */
    public function getBkaccCrdtp()
    {
        return $this->bkacc_crdtp;
    }

    /**
     * @param mixed $bkacc_crdtp
     */
    public function setBkaccCrdtp($bkacc_crdtp): void
    {
        $this->bkacc_crdtp = $bkacc_crdtp;
    }

    /**
     * @return mixed
     */
    public function getBkaccCdtp()
    {
        return $this->bkacc_cdtp;
    }

    /**
     * @param mixed $bkacc_cdtp
     */
    public function setBkaccCdtp($bkacc_cdtp): void
    {
        $this->bkacc_cdtp = $bkacc_cdtp;
    }

    /**
     * @return mixed
     */
    public function getBkaccCdno()
    {
        return $this->bkacc_cdno;
    }

    /**
     * @param mixed $bkacc_cdno
     */
    public function setBkaccCdno($bkacc_cdno): void
    {
        $this->bkacc_cdno = $bkacc_cdno;
    }

    /**
     * @return mixed
     */
    public function getBkaccPhone()
    {
        return $this->bkacc_phone;
    }

    /**
     * @param mixed $bkacc_phone
     */
    public function setBkaccPhone($bkacc_phone): void
    {
        $this->bkacc_phone = $bkacc_phone;
    }

    /**
     * @return mixed
     */
    public function getBkaccCrsmk()
    {
        return $this->bkacc_crsmk;
    }

    /**
     * @param mixed $bkacc_crsmk
     */
    public function setBkaccCrsmk($bkacc_crsmk): void
    {
        $this->bkacc_crsmk = $bkacc_crsmk;
    }

    /**
     * @return mixed
     */
    public function getBkaccOpenbkcd()
    {
        return $this->bkacc_openbkcd;
    }

    /**
     * @param mixed $bkacc_openbkcd
     */
    public function setBkaccOpenbkcd($bkacc_openbkcd): void
    {
        $this->bkacc_openbkcd = $bkacc_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getBkaccOpenbknm()
    {
        return $this->bkacc_openbknm;
    }

    /**
     * @param mixed $bkacc_openbknm
     */
    public function setBkaccOpenbknm($bkacc_openbknm): void
    {
        $this->bkacc_openbknm = $bkacc_openbknm;
    }

    /**
     * @return mixed
     */
    public function getBkaccPrccd()
    {
        return $this->bkacc_prccd;
    }

    /**
     * @param mixed $bkacc_prccd
     */
    public function setBkaccPrccd($bkacc_prccd): void
    {
        $this->bkacc_prccd = $bkacc_prccd;
    }

    /**
     * @return mixed
     */
    public function getBkaccPrcnm()
    {
        return $this->bkacc_prcnm;
    }

    /**
     * @param mixed $bkacc_prcnm
     */
    public function setBkaccPrcnm($bkacc_prcnm): void
    {
        $this->bkacc_prcnm = $bkacc_prcnm;
    }

    /**
     * @return mixed
     */
    public function getBkaccCitycd()
    {
        return $this->bkacc_citycd;
    }

    /**
     * @param mixed $bkacc_citycd
     */
    public function setBkaccCitycd($bkacc_citycd): void
    {
        $this->bkacc_citycd = $bkacc_citycd;
    }

    /**
     * @return mixed
     */
    public function getBkaccCitynm()
    {
        return $this->bkacc_citynm;
    }

    /**
     * @param mixed $bkacc_citynm
     */
    public function setBkaccCitynm($bkacc_citynm): void
    {
        $this->bkacc_citynm = $bkacc_citynm;
    }

    /**
     * @return mixed
     */
    public function getOperatorDocuopname()
    {
        return $this->operator_docuopname;
    }

    /**
     * @param mixed $operator_docuopname
     */
    public function setOperatorDocuopname($operator_docuopname): void
    {
        $this->operator_docuopname = $operator_docuopname;
    }

    /**
     * @return mixed
     */
    public function getOperatorDocuopmobile()
    {
        return $this->operator_docuopmobile;
    }

    /**
     * @param mixed $operator_docuopmobile
     */
    public function setOperatorDocuopmobile($operator_docuopmobile): void
    {
        $this->operator_docuopmobile = $operator_docuopmobile;
    }

    /**
     * @return mixed
     */
    public function getOperatorDocuopidcard()
    {
        return $this->operator_docuopidcard;
    }

    /**
     * @param mixed $operator_docuopidcard
     */
    public function setOperatorDocuopidcard($operator_docuopidcard): void
    {
        $this->operator_docuopidcard = $operator_docuopidcard;
    }

    /**
     * @return mixed
     */
    public function getOperatorCheckername()
    {
        return $this->operator_checkername;
    }

    /**
     * @param mixed $operator_checkername
     */
    public function setOperatorCheckername($operator_checkername): void
    {
        $this->operator_checkername = $operator_checkername;
    }

    /**
     * @return mixed
     */
    public function getOperatorCheckermobile()
    {
        return $this->operator_checkermobile;
    }

    /**
     * @param mixed $operator_checkermobile
     */
    public function setOperatorCheckermobile($operator_checkermobile): void
    {
        $this->operator_checkermobile = $operator_checkermobile;
    }

    /**
     * @return mixed
     */
    public function getOperatorCheckeridcard()
    {
        return $this->operator_checkeridcard;
    }

    /**
     * @param mixed $operator_checkeridcard
     */
    public function setOperatorCheckeridcard($operator_checkeridcard): void
    {
        $this->operator_checkeridcard = $operator_checkeridcard;
    }

    /**
     * @return mixed
     */
    public function getActiflag()
    {
        return $this->actiflag;
    }

    /**
     * @param mixed $actiflag
     */
    public function setActiflag($actiflag): void
    {
        $this->actiflag = $actiflag;
    }

    /**
     * @return mixed
     */
    public function getNotificationurl()
    {
        return $this->notificationurl;
    }

    /**
     * @param mixed $notificationurl
     */
    public function setNotificationurl($notificationurl): void
    {
        $this->notificationurl = $notificationurl;
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
            'FcFlg' => $this->fcflg,
            'AccTp' => $this->acctp,
            'CltAcc' => [
                'CltNo' => $this->cltacc_cltno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'Clt' => [
                'Kd' => $this->clt_kd,
                'Nm' => $this->clt_nm,
                'CdTp' => $this->clt_cdtp,
                'CdNo' => $this->clt_cdno,
                'CdIsDt' => $this->clt_cdisdt,
                'CdExDt' => $this->clt_cdexdt,
                'UscId' => $this->clt_uscid,
                'UscExDt' => $this->clt_uscexdt,
                'OrgCd' => $this->clt_orgcd,
                'BsLic' => $this->clt_bslic,
                'Swdjh' => $this->clt_swdjh,
                'MobNo' => $this->clt_mobno,
                'Email' => $this->clt_email,
                'PostNo' => $this->clt_postno,
                'Addr' => $this->clt_addr,
                'CityCd' => $this->clt_citycd,
                'InduCode' => $this->clt_inducode,
                'Scale' => $this->clt_scale,
                'BasicAcctNo' => $this->clt_basicacctno,
                'AuthCapital' => $this->clt_authcapital,
                'BusiScope' => $this->clt_busiscope,
            ],
            'Oper' => [
                'Nm' => $this->oper_nm,
                'CdNo' => $this->oper_cdno,
                'MobNo' => $this->oper_mobno,
            ],
            'FleInfo' => [
                'DtlNo' => $this->fleinfo_dtlno,
                'BsiTy' => $this->fleinfo_bsity,
                'FleTheme' => $this->fleinfo_fletheme,
                'FleMeo' => $this->fleinfo_flemeo,
                'FleTy' => $this->fleinfo_flety,
                'FleNm' => $this->fleinfo_flenm,
                'FlePth' => $this->fleinfo_flepth,
                'FleCont' => $this->fleinfo_flecont,
            ],
            'BkAcc' => [
                'BkId' => $this->bkacc_bkid,
                'AccNo' => $this->bkacc_accno,
                'CrdTp' => $this->bkacc_crdtp,
                'CdTp' => $this->bkacc_cdtp,
                'CdNo' => $this->bkacc_cdno,
                'Phone' => $this->bkacc_phone,
                'CrsMk' => $this->bkacc_crsmk,
                'OpenBkCd' => $this->bkacc_openbkcd,
                'OpenBkNm' => $this->bkacc_openbknm,
                'PrcCd' => $this->bkacc_prccd,
                'PrcNm' => $this->bkacc_prcnm,
                'CityCd' => $this->bkacc_citycd,
                'CityNm' => $this->bkacc_citynm,
            ],
            'Operator' => [
                'docuOpName' => $this->operator_docuopname,
                'docuOpMobile' => $this->operator_docuopmobile,
                'docuOpIdCard' => $this->operator_docuopidcard,
                'checkerName' => $this->operator_checkername,
                'checkerMobile' => $this->operator_checkermobile,
                'checkerIdCard' => $this->operator_checkeridcard,
            ],
            'ActiFlag' => $this->actiflag,
            'NotificationURL' => $this->notificationurl,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}