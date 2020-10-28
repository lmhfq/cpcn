<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1004Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1004";

    public $cltacc_cltnm;

    public $bkacc_souraccno;

    public $bkacc_bkid;

    public $bkacc_accno;

    public $bkacc_accnm;

    public $bkacc_acctp;

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

    public $fcflg;

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
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'BkAcc' => [
                'SourAccNo' => $this->bkacc_souraccno,
                'BkId' => $this->bkacc_bkid,
                'AccNo' => $this->bkacc_accno,
                'AccNm' => $this->bkacc_accnm,
                'AccTp' => $this->bkacc_acctp,
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
            'FcFlg' => $this->fcflg,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}