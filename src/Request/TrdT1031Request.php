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