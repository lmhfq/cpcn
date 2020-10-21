<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

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