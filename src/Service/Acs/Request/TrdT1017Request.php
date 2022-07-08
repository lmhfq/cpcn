<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1017Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1017";

    protected $qryflag;

    protected $bkid;

    protected $openbkcd;

    protected $openbknm;

    protected $citycd;

    protected $querynum;

    /**
     * @return mixed
     */
    public function getQryflag()
    {
        return $this->qryflag;
    }

    /**
     * @param mixed $qryflag
     */
    public function setQryflag($qryflag): void
    {
        $this->qryflag = $qryflag;
    }

    /**
     * @return mixed
     */
    public function getBkid()
    {
        return $this->bkid;
    }

    /**
     * @param mixed $bkid
     */
    public function setBkid($bkid): void
    {
        $this->bkid = $bkid;
    }

    /**
     * @return mixed
     */
    public function getOpenbkcd()
    {
        return $this->openbkcd;
    }

    /**
     * @param mixed $openbkcd
     */
    public function setOpenbkcd($openbkcd): void
    {
        $this->openbkcd = $openbkcd;
    }

    /**
     * @return mixed
     */
    public function getOpenbknm()
    {
        return $this->openbknm;
    }

    /**
     * @param mixed $openbknm
     */
    public function setOpenbknm($openbknm): void
    {
        $this->openbknm = $openbknm;
    }

    /**
     * @return mixed
     */
    public function getCitycd()
    {
        return $this->citycd;
    }

    /**
     * @param mixed $citycd
     */
    public function setCitycd($citycd): void
    {
        $this->citycd = $citycd;
    }

    /**
     * @return mixed
     */
    public function getQuerynum()
    {
        return $this->querynum;
    }

    /**
     * @param mixed $querynum
     */
    public function setQuerynum($querynum): void
    {
        $this->querynum = $querynum;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'QryFlag' => $this->qryflag,
            'BkId' => $this->bkid,
            'OpenBkCd' => $this->openbkcd,
            'OpenBkNm' => $this->openbknm,
            'CityCd' => $this->citycd,
            'QueryNum' => $this->querynum,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}