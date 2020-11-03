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
    public function getBkaccSouraccno()
    {
        return $this->bkacc_souraccno;
    }

    /**
     * @param mixed $bkacc_souraccno
     */
    public function setBkaccSouraccno($bkacc_souraccno): void
    {
        $this->bkacc_souraccno = $bkacc_souraccno;
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
    public function getBkaccAccnm()
    {
        return $this->bkacc_accnm;
    }

    /**
     * @param mixed $bkacc_accnm
     */
    public function setBkaccAccnm($bkacc_accnm): void
    {
        $this->bkacc_accnm = $bkacc_accnm;
    }

    /**
     * @return mixed
     */
    public function getBkaccAcctp()
    {
        return $this->bkacc_acctp;
    }

    /**
     * @param mixed $bkacc_acctp
     */
    public function setBkaccAcctp($bkacc_acctp): void
    {
        $this->bkacc_acctp = $bkacc_acctp;
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