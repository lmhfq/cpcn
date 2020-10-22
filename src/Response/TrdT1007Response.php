<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT1007Response extends TrdBaseResponse
{
    protected $bkacc_state;
    protected $bkacc_bkid;
    protected $bkacc_bknm;
    protected $bkacc_accno;
    protected $bkacc_accnm;
    protected $bkacc_acctp;
    protected $bkacc_cdtp;
    protected $bkacc_cdno;
    protected $bkacc_crsmk;
    protected $bkacc_openbkcd;
    protected $bkacc_openbknm;
    protected $bkacc_prccd;
    protected $bkacc_prcnm;
    protected $bkacc_citycd;
    protected $bkacc_citynm;

    /**
     * @return mixed
     */
    public function getBkaccState()
    {
        return $this->bkacc_state;
    }

    /**
     * @param mixed $bkacc_state
     */
    public function setBkaccState($bkacc_state): void
    {
        $this->bkacc_state = $bkacc_state;
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
    public function getBkaccBknm()
    {
        return $this->bkacc_bknm;
    }

    /**
     * @param mixed $bkacc_bknm
     */
    public function setBkaccBknm($bkacc_bknm): void
    {
        $this->bkacc_bknm = $bkacc_bknm;
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

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $bkAcc = ArrayUtil::get('BkAcc', $this->responseData, []);
            if ($bkAcc) {
                $this->bkacc_state = ArrayUtil::get('State', $bkAcc);
                $this->bkacc_bkid = ArrayUtil::get('BkId', $bkAcc);
                $this->bkacc_bknm = ArrayUtil::get('BkNm', $bkAcc);
                $this->bkacc_accno = ArrayUtil::get('AccNo', $bkAcc);
                $this->bkacc_accnm = ArrayUtil::get('AccNm', $bkAcc);
                $this->bkacc_acctp = ArrayUtil::get('AccTp', $bkAcc);
                $this->bkacc_cdtp = ArrayUtil::get('CdTp', $bkAcc);
                $this->bkacc_cdno = ArrayUtil::get('CdNo', $bkAcc);
                $this->bkacc_crsmk = ArrayUtil::get('CrsMk', $bkAcc);
                $this->bkacc_openbkcd = ArrayUtil::get('OpenBkCd', $bkAcc);
                $this->bkacc_openbknm = ArrayUtil::get('OpenBkNm', $bkAcc);
                $this->bkacc_prccd = ArrayUtil::get('PrcCd', $bkAcc);
                $this->bkacc_prcnm = ArrayUtil::get('PrcNm', $bkAcc);
                $this->bkacc_citycd = ArrayUtil::get('CityCd', $bkAcc);
                $this->bkacc_citynm = ArrayUtil::get('CityNm', $bkAcc);
            }
        }
    }
}