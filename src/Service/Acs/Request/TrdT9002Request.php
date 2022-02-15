<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9002";

    protected $quydt;

    protected $quystdt;

    protected $quyenddt;

    protected $quydtpe;

    protected $subno;

    protected $tye;

    protected $dtrcd;

    protected $paytype;

    protected $secpaytype;

    protected $merchantid;

    protected $pagsiz;

    protected $curpag;

    /**
     * @return mixed
     */
    public function getQuydt()
    {
        return $this->quydt;
    }

    /**
     * @param mixed $quydt
     */
    public function setQuydt($quydt): void
    {
        $this->quydt = $quydt;
    }

    /**
     * @return mixed
     */
    public function getQuystdt()
    {
        return $this->quystdt;
    }

    /**
     * @param mixed $quystdt
     */
    public function setQuystdt($quystdt): void
    {
        $this->quystdt = $quystdt;
    }

    /**
     * @return mixed
     */
    public function getQuyenddt()
    {
        return $this->quyenddt;
    }

    /**
     * @param mixed $quyenddt
     */
    public function setQuyenddt($quyenddt): void
    {
        $this->quyenddt = $quyenddt;
    }

    /**
     * @return mixed
     */
    public function getQuydtpe()
    {
        return $this->quydtpe;
    }

    /**
     * @param mixed $quydtpe
     */
    public function setQuydtpe($quydtpe): void
    {
        $this->quydtpe = $quydtpe;
    }

    /**
     * @return mixed
     */
    public function getSubno()
    {
        return $this->subno;
    }

    /**
     * @param mixed $subno
     */
    public function setSubno($subno): void
    {
        $this->subno = $subno;
    }

    /**
     * @return mixed
     */
    public function getTye()
    {
        return $this->tye;
    }

    /**
     * @param mixed $tye
     */
    public function setTye($tye): void
    {
        $this->tye = $tye;
    }

    /**
     * @return mixed
     */
    public function getDtrcd()
    {
        return $this->dtrcd;
    }

    /**
     * @param mixed $dtrcd
     */
    public function setDtrcd($dtrcd): void
    {
        $this->dtrcd = $dtrcd;
    }

    /**
     * @return mixed
     */
    public function getPaytype()
    {
        return $this->paytype;
    }

    /**
     * @param mixed $paytype
     */
    public function setPaytype($paytype): void
    {
        $this->paytype = $paytype;
    }

    /**
     * @return mixed
     */
    public function getSecpaytype()
    {
        return $this->secpaytype;
    }

    /**
     * @param mixed $secpaytype
     */
    public function setSecpaytype($secpaytype): void
    {
        $this->secpaytype = $secpaytype;
    }

    /**
     * @return mixed
     */
    public function getMerchantid()
    {
        return $this->merchantid;
    }

    /**
     * @param mixed $merchantid
     */
    public function setMerchantid($merchantid): void
    {
        $this->merchantid = $merchantid;
    }

    /**
     * @return mixed
     */
    public function getPagsiz()
    {
        return $this->pagsiz;
    }

    /**
     * @param mixed $pagsiz
     */
    public function setPagsiz($pagsiz): void
    {
        $this->pagsiz = $pagsiz;
    }

    /**
     * @return mixed
     */
    public function getCurpag()
    {
        return $this->curpag;
    }

    /**
     * @param mixed $curpag
     */
    public function setCurpag($curpag): void
    {
        $this->curpag = $curpag;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'QuyDt' => $this->quydt,
            'QuyStDt' => $this->quystdt,
            'QuyEndDt' => $this->quyenddt,
            'QuyDtPe' => $this->quydtpe,
            'SubNo' => $this->subno,
            'tye' => $this->tye,
            'DTrCd' => $this->dtrcd,
            'PayType' => $this->paytype,
            'SecPayType' => $this->secpaytype,
            'MerchantId' => $this->merchantid,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}