<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\ResponseCode;

class TrdT1115Response extends TrdBaseResponse
{
    protected $bkacc_bkid;
    protected $bkacc_bknm;
    protected $bkacc_accno;
    protected $bkacc_crdtp;
    protected $bkacc_crdbin;

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
    public function getBkaccCrdbin()
    {
        return $this->bkacc_crdbin;
    }

    /**
     * @param mixed $bkacc_crdbin
     */
    public function setBkaccCrdbin($bkacc_crdbin): void
    {
        $this->bkacc_crdbin = $bkacc_crdbin;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $bkAcc = ArrayUtil::get('BkAcc', $this->responseData, []);
            if ($bkAcc) {
                $this->bkacc_bkid = ArrayUtil::get('BkId', $bkAcc);
                $this->bkacc_bknm = ArrayUtil::get('BkNm', $bkAcc);
                $this->bkacc_accno = ArrayUtil::get('AccNo', $bkAcc);
                $this->bkacc_crdtp = ArrayUtil::get('CrdTp', $bkAcc);
                $this->bkacc_crdbin = ArrayUtil::get('CrdBin', $bkAcc);
            }
        }
    }
}