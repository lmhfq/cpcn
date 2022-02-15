<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4001Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4001";

    protected $cltacc_subno;

    protected $cltacc_cltnm;

    protected $qpy_bkid;

    protected $qpy_accno;

    protected $qpy_accnm;

    protected $qpy_cdtp;

    protected $qpy_cdno;

    protected $qpy_mobno;

    protected $qpy_acctp;

    protected $fcflg;

    protected $smsflg;

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
    public function getQpyBkid()
    {
        return $this->qpy_bkid;
    }

    /**
     * @param mixed $qpy_bkid
     */
    public function setQpyBkid($qpy_bkid): void
    {
        $this->qpy_bkid = $qpy_bkid;
    }

    /**
     * @return mixed
     */
    public function getQpyAccno()
    {
        return $this->qpy_accno;
    }

    /**
     * @param mixed $qpy_accno
     */
    public function setQpyAccno($qpy_accno): void
    {
        $this->qpy_accno = $qpy_accno;
    }

    /**
     * @return mixed
     */
    public function getQpyAccnm()
    {
        return $this->qpy_accnm;
    }

    /**
     * @param mixed $qpy_accnm
     */
    public function setQpyAccnm($qpy_accnm): void
    {
        $this->qpy_accnm = $qpy_accnm;
    }

    /**
     * @return mixed
     */
    public function getQpyCdtp()
    {
        return $this->qpy_cdtp;
    }

    /**
     * @param mixed $qpy_cdtp
     */
    public function setQpyCdtp($qpy_cdtp): void
    {
        $this->qpy_cdtp = $qpy_cdtp;
    }

    /**
     * @return mixed
     */
    public function getQpyCdno()
    {
        return $this->qpy_cdno;
    }

    /**
     * @param mixed $qpy_cdno
     */
    public function setQpyCdno($qpy_cdno): void
    {
        $this->qpy_cdno = $qpy_cdno;
    }

    /**
     * @return mixed
     */
    public function getQpyMobno()
    {
        return $this->qpy_mobno;
    }

    /**
     * @param mixed $qpy_mobno
     */
    public function setQpyMobno($qpy_mobno): void
    {
        $this->qpy_mobno = $qpy_mobno;
    }

    /**
     * @return mixed
     */
    public function getQpyAcctp()
    {
        return $this->qpy_acctp;
    }

    /**
     * @param mixed $qpy_acctp
     */
    public function setQpyAcctp($qpy_acctp): void
    {
        $this->qpy_acctp = $qpy_acctp;
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
    public function getSmsflg()
    {
        return $this->smsflg;
    }

    /**
     * @param mixed $smsflg
     */
    public function setSmsflg($smsflg): void
    {
        $this->smsflg = $smsflg;
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
            'Qpy' => [
                'BkId' => $this->qpy_bkid,
                'AccNo' => $this->qpy_accno,
                'AccNm' => $this->qpy_accnm,
                'CdTp' => $this->qpy_cdtp,
                'CdNo' => $this->qpy_cdno,
                'MobNo' => $this->qpy_mobno,
                'AccTp' => $this->qpy_acctp,
            ],
            'FcFlg' => $this->fcflg,
            'SMSFlg' => $this->smsflg,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}