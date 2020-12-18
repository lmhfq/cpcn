<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Entity\BkAccEntity;
use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT1020Response extends TrdBaseResponse
{
    protected $cltacc_cltpid;
    protected $cltacc_subno;
    protected $cltacc_cltnm;
    protected $cltacc_bnkeid;
    protected $cltacc_openbkcd;
    protected $cltacc_openbknm;
    protected $cltacc_acctcd;
    protected $resttime;
    protected $clt_kd;
    protected $clt_nm;
    protected $clt_cdtp;
    protected $clt_cdno;
    protected $clt_uscexdt;
    protected $clt_mobno;
    protected $clt_email;
    protected $clt_addr;
    protected $clt_basicacctno;
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
    protected $bkacc_crdtp;

    /**
     * @var array
     */
    protected $bkAcc;
    /**
     * @return mixed
     */
    public function getCltaccCltpid()
    {
        return $this->cltacc_cltpid;
    }

    /**
     * @param mixed $cltacc_cltpid
     */
    public function setCltaccCltpid($cltacc_cltpid): void
    {
        $this->cltacc_cltpid = $cltacc_cltpid;
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
    public function getCltaccBnkeid()
    {
        return $this->cltacc_bnkeid;
    }

    /**
     * @param mixed $cltacc_bnkeid
     */
    public function setCltaccBnkeid($cltacc_bnkeid): void
    {
        $this->cltacc_bnkeid = $cltacc_bnkeid;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbkcd()
    {
        return $this->cltacc_openbkcd;
    }

    /**
     * @param mixed $cltacc_openbkcd
     */
    public function setCltaccOpenbkcd($cltacc_openbkcd): void
    {
        $this->cltacc_openbkcd = $cltacc_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbknm()
    {
        return $this->cltacc_openbknm;
    }

    /**
     * @param mixed $cltacc_openbknm
     */
    public function setCltaccOpenbknm($cltacc_openbknm): void
    {
        $this->cltacc_openbknm = $cltacc_openbknm;
    }

    /**
     * @return mixed
     */
    public function getCltaccAcctcd()
    {
        return $this->cltacc_acctcd;
    }

    /**
     * @param mixed $cltacc_acctcd
     */
    public function setCltaccAcctcd($cltacc_acctcd): void
    {
        $this->cltacc_acctcd = $cltacc_acctcd;
    }

    /**
     * @return array
     */
    public function getBkAcc(): array
    {
        return $this->bkAcc;
    }

    /**
     * @param array $bkAcc
     */
    public function setBkAcc(array $bkAcc): void
    {
        $this->bkAcc = $bkAcc;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->resttime = ArrayUtil::get('RestTime', $this->responseData);
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData, []);
            if ($cltAcc) {
                $this->cltacc_cltpid = ArrayUtil::get('CltPid', $cltAcc);
                $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
                $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
                $this->cltacc_bnkeid = ArrayUtil::get('BnkEid', $cltAcc);
                $this->cltacc_openbkcd = ArrayUtil::get('OpenBkCd', $cltAcc);
                $this->cltacc_openbknm = ArrayUtil::get('OpenBkNm', $cltAcc);
                $this->cltacc_acctcd = ArrayUtil::get('AcctCd', $cltAcc);
            }
            $clt = ArrayUtil::get('Clt', $this->responseData, []);
            if ($clt) {
                $this->clt_kd = ArrayUtil::get('Kd', $cltAcc);
                $this->clt_nm = ArrayUtil::get('Nm', $cltAcc);
                $this->clt_cdtp = ArrayUtil::get('CdTp', $cltAcc);
                $this->clt_cdno = ArrayUtil::get('CdNo', $cltAcc);
                $this->clt_uscexdt = ArrayUtil::get('UscExDt', $cltAcc);
                $this->clt_mobno = ArrayUtil::get('MobNo', $cltAcc);
                $this->clt_email = ArrayUtil::get('Email', $cltAcc);
                $this->clt_addr = ArrayUtil::get('Addr', $cltAcc);
                $this->clt_basicacctno = ArrayUtil::get('BasicAcctNo', $cltAcc);
            }
            $bkAcc = ArrayUtil::get('BkAcc', $this->responseData, []);
            if (isset($bkAcc[0])) {
                foreach ($bkAcc as $item) {
                    $bkAccEntity = new BkAccEntity();
                    $bkAccEntity->setBkaccBkid(ArrayUtil::get('BkId', $item));
                    $bkAccEntity->setBkaccBknm(ArrayUtil::get('BkNm', $item));
                    $bkAccEntity->setBkaccAccno(ArrayUtil::get('AccNo', $item));
                    $bkAccEntity->setBkaccAccnm(ArrayUtil::get('AccNm', $item));
                    $bkAccEntity->setBkaccAcctp(ArrayUtil::get('AccTp', $item));
                    $bkAccEntity->setBkaccCdtp(ArrayUtil::get('CdTp', $item));
                    $bkAccEntity->setBkaccCdno(ArrayUtil::get('CdNo', $item));
                    $bkAccEntity->setBkaccCrsmk(ArrayUtil::get('CrsMk', $item));
                    $bkAccEntity->setBkaccOpenbkcd(ArrayUtil::get('OpenBkCd', $item));
                    $bkAccEntity->setBkaccOpenbknm(ArrayUtil::get('OpenBkNm', $item));
                    $bkAccEntity->setBkaccPrccd(ArrayUtil::get('PrcCd', $item));
                    $bkAccEntity->setBkaccPrcnm(ArrayUtil::get('PrcNm', $item));
                    $bkAccEntity->setBkaccCitycd(ArrayUtil::get('CityCd', $item));
                    $bkAccEntity->setBkaccCitynm(ArrayUtil::get('CityNm', $item));
                    $bkAccEntity->setBkaccCrdtp(ArrayUtil::get('CrdTp', $item));
                    $this->bkAcc[] = $bkAccEntity;
                }
            }else{
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
                $this->bkacc_crdtp = ArrayUtil::get('CrdTp', $bkAcc);
            }
        }
    }
}