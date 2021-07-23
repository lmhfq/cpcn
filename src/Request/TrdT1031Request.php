<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use InvalidArgumentException;
use Lmh\Cpcn\Entity\FileInfoEntity;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1031Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1031";

    /**
     * @var string 功能标示 (1:开户 2变更 3 销户)
     */
    public $fcflg = '1';
    /**
     * @var string 账户类型( 1:客户资金账户 3:合作方收益账户 4:手续费账户)
     */
    protected $acctp = "1";
    /**
     * @var string 客户号
     */
    protected $cltacc_cltno;
    /**
     * @var string  资金账号 FcFlg=2,3时必填
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 客户性质(0 个人;1 公司) FcFlg=1 时必填
     */
    protected $clt_kd;
    /**
     * @var string  姓名(当 Clt.Kd=0 时，该节 点的内容必须与节点 CltAcc.CltNm 的内容一致) 公司：法定代表人 个人：自然人
     */
    protected $clt_nm;
    /**
     * @var string 法定代表人/自然人 证件类型(
     */
    protected $clt_cdtp = 'A';
    /**
     * @var string 法定代表人/自然人 证件号码
     */
    protected $clt_cdno;
    /**
     * @var string 法定代表人（公司必填） 证件签发日期
     */
    protected $clt_cdisdt;
    /**
     * @var string 法定代表人（公司必填） 证件到期日期，若长期有效 请填写 20991231
     */
    protected $clt_cdexdt;
    /**
     * @var string 统一社会信用代码(公司必 填)
     */
    protected $clt_uscid;
    /**
     * @var string 统一社会信用代码到期日 (公司必填) 如证件未记录有效期则设定 为 21000101，当证件长期有 效时为 99991231
     */
    protected $clt_uscexdt;

    protected $clt_orgcd;

    protected $clt_bslic;

    protected $clt_swdjh;
    /**
     * @var string 手机号码
     */
    protected $clt_mobno;
    /**
     * @var string 电子邮箱
     */
    protected $clt_email;
    /**
     * @var string 邮政编码
     */
    protected $clt_postno;
    /**
     * @var string 地址
     */
    protected $clt_addr;

    protected $clt_citycd;

    protected $clt_inducode;
    /**
     * @var string 企业规模： 01：大型 02：中型 03：小型 04：微型 98：其他
     */
    protected $clt_scale;
    /**
     * @var string 企业基本账号
     */
    protected $clt_basicacctno;

    protected $clt_authcapital;

    protected $clt_busiscope;
    /**
     * @var string 经办人姓名 FcFlg=1 时必填 企业开户时填写
     */
    protected $oper_nm;
    /**
     * @var string 经办人身份证号码
     */
    protected $oper_cdno;
    /**
     * @var string 经办人手机号
     */
    protected $oper_mobno;
    /**
     * @var array[FileInfoEntity] 证件照片信息(0~N 条) FcFlg=1 时必填
     * @see FileInfoEntity
     */
    public $fleinfo = [];
    /**
     * @var string 银行编号
     */
    protected $bkacc_bkid;
    /**
     * @var string 银行账号(卡号)
     */
    protected $bkacc_accno;
    /**
     * @var string 银行账户(卡)类型 1:个人借记卡(储蓄卡)，默 认2:个人贷记卡(信用卡) 3:个人电子账户(银行二类 户) A:企业一般结算账户，默认 B:企业电子账户
     */
    protected $bkacc_crdtp;
    /**
     * @var string 开户证件类型
     */
    protected $bkacc_cdtp = "A";
    /**
     * @var string 证件号码
     */
    protected $bkacc_cdno;
    /**
     * @var string 银行预留手机号码 个人银行卡时必填
     */
    protected $bkacc_phone;
    /**
     * @var string  ★ 2 提现账户-跨行标示(1:本 行;2:跨行)
     */
    protected $bkacc_crsmk = "2";
    /**
     * @var string 开户网点编号
     */
    protected $bkacc_openbkcd;

    protected $bkacc_openbknm;

    protected $bkacc_prccd;

    protected $bkacc_prcnm;

    protected $bkacc_citycd;

    protected $bkacc_citynm;

    protected $operator_docuopname;

    protected $operator_docuopmobile;

    protected $operator_docuopidcard;

    protected $operator_checkername;

    protected $operator_checkermobile;

    protected $operator_checkeridcard;

    protected $actiflag;

    protected $notificationurl;

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
     * @return array
     */
    public function getFleinfo(): array
    {
        return $this->fleinfo;
    }

    /**
     * @param array $fleinfo
     */
    public function setFleinfo(array $fleinfo): void
    {
        $this->fleinfo = $fleinfo;
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
     * @return string
     */
    public function getCltaccSubno(): string
    {
        return $this->cltacc_subno;
    }

    /**
     * @param string $cltacc_subno
     */
    public function setCltaccSubno(string $cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $fileInfo = [];
        foreach ($this->fleinfo as $v) {
            if ($v && !$v instanceof FileInfoEntity) {
                throw new InvalidArgumentException("fleinfo 格式不支持");
            }
            /**
             * @var $v FileInfoEntity
             */
            $fileInfo[] = [
                'DtlNo' => $v->getFleinfoDtlno(),
                'BsiTy' => $v->getFleinfoBsity(),
                'FleTheme' => $v->getFleinfoFletheme(),
                'FleTy' => $v->getFleinfoFlety(),
                'FleNm' => $v->getFleinfoFlenm(),
                'FleCont' => $v->getFleinfoFlecont(),
            ];
        }
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $clt = [];
        if ($this->fcflg == 1) {
            $clt['Kd'] = $this->clt_kd;
            $clt['Nm'] = $this->clt_nm;
            $clt['CdTp'] = $this->clt_cdtp;
            $clt['CdNo'] = $this->clt_cdno;
            $clt['MobNo'] = $this->clt_mobno;
        } else {
            if ($this->clt_kd) {
                $clt['Kd'] = $this->clt_kd;
            }
            if ($this->clt_nm) {
                $clt['Nm'] = $this->clt_nm;
            }
            if ($this->clt_cdtp) {
                $clt['CdTp'] = $this->clt_cdtp;
            }
            if ($this->clt_cdno) {
                $clt['CdNo'] = $this->clt_cdno;
            }
            if ($this->clt_mobno) {
                $clt['MobNo'] = $this->clt_mobno;
            }
        }
        if ($this->clt_email) {
            $clt['Email'] = $this->clt_email;
        }
        if ($this->clt_addr) {
            $clt['Addr'] = $this->clt_addr;
        }
        if ($this->clt_citycd) {
            $clt['CityCd'] = $this->clt_citycd;
        }
        if ($this->clt_inducode) {
            $clt['InduCode'] = $this->clt_inducode;
        }
        if ($this->clt_scale) {
            $clt['Scale'] = $this->clt_scale;
        }
        if ($this->clt_basicacctno) {
            $clt['BasicAcctNo'] = $this->clt_basicacctno;
        }
        if ($this->clt_authcapital) {
            $clt['AuthCapital'] = $this->clt_authcapital;
        }
        if ($this->clt_busiscope) {
            $clt['BusiScope'] = $this->clt_busiscope;
        }
        if ($this->clt_postno) {
            $clt['PostNo'] = $this->clt_postno;
        }
        //企业
        if ($this->clt_kd == 1) {
            $clt = array_merge($clt, [
                'CdIsDt' => $this->clt_cdisdt,
                'CdExDt' => $this->clt_cdexdt,
                'UscId' => $this->clt_uscid,
                'UscExDt' => $this->clt_uscexdt,
                'OrgCd' => $this->clt_orgcd,
            ]);
        }
        $bkAcc = [];
        if ($this->fcflg == 1) {
            $bkAcc['BkId'] = $this->bkacc_bkid;
            $bkAcc['AccNo'] = $this->bkacc_accno;
            $bkAcc['CrdTp'] = $this->bkacc_crdtp;
            $bkAcc['CdTp'] = $this->bkacc_cdtp;
            $bkAcc['CdNo'] = $this->bkacc_cdno;
            $bkAcc['Phone'] = $this->bkacc_phone;
            $bkAcc['CrsMk'] = $this->bkacc_crsmk;
            $bkAcc['OpenBkCd'] = $this->bkacc_openbkcd;
        }
        if ($this->bkacc_openbknm) {
            $bkAcc['OpenBkNm'] = $this->bkacc_openbknm;
        }
        if ($this->bkacc_prccd) {
            $bkAcc['PrcCd'] = $this->bkacc_prccd;
        }
        if ($this->bkacc_prcnm) {
            $bkAcc['PrcNm'] = $this->bkacc_prcnm;
        }
        if ($this->bkacc_citycd) {
            $bkAcc['CityCd'] = $this->bkacc_citycd;
        }
        if ($this->bkacc_citynm) {
            $bkAcc['CityNm'] = $this->bkacc_citynm;
        }
        $cltAcc = [
            'CltNo' => $this->cltacc_cltno,
            'CltNm' => $this->cltacc_cltnm,
        ];
        if ($this->cltacc_subno) {
            $cltAcc['SubNo'] = $this->cltacc_subno;
        }
        $data = array_merge($data, [
            'FcFlg' => $this->fcflg,
            'AccTp' => $this->acctp,
            'CltAcc' => $cltAcc,
            'Clt' => $clt,
            'BkAcc' => $bkAcc,
            'ActiFlag' => $this->actiflag,
            'NotificationURL' => $this->notificationurl,
        ]);
        if ($this->clt_kd == 1) {
            $data = array_merge($data, [
                'Oper' => [
                    'Nm' => $this->oper_nm,
                    'CdNo' => $this->oper_cdno,
                    'MobNo' => $this->oper_mobno,
                ]
            ]);
            $data = array_merge($data, $fileInfo);
        }
        $xml = Xml::build($data, 'MSG', 'FleInfo');
        parent::process($xml);
    }
}