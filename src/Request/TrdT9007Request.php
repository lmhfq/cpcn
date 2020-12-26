<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9007Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9007";

    protected $subno;

    protected $tye;

    protected $aclamtbgn;

    protected $aclamtend;

    protected $bsitye;

    protected $dtrdtype;

    protected $dptnsrl;

    protected $dplatsrl;

    protected $pagsiz;

    protected $curpag;

    protected $sortr;

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
    public function getAclamtbgn()
    {
        return $this->aclamtbgn;
    }

    /**
     * @param mixed $aclamtbgn
     */
    public function setAclamtbgn($aclamtbgn): void
    {
        $this->aclamtbgn = $aclamtbgn;
    }

    /**
     * @return mixed
     */
    public function getAclamtend()
    {
        return $this->aclamtend;
    }

    /**
     * @param mixed $aclamtend
     */
    public function setAclamtend($aclamtend): void
    {
        $this->aclamtend = $aclamtend;
    }

    /**
     * @return mixed
     */
    public function getBsitye()
    {
        return $this->bsitye;
    }

    /**
     * @param mixed $bsitye
     */
    public function setBsitye($bsitye): void
    {
        $this->bsitye = $bsitye;
    }

    /**
     * @return mixed
     */
    public function getDtrdtype()
    {
        return $this->dtrdtype;
    }

    /**
     * @param mixed $dtrdtype
     */
    public function setDtrdtype($dtrdtype): void
    {
        $this->dtrdtype = $dtrdtype;
    }

    /**
     * @return mixed
     */
    public function getDptnsrl()
    {
        return $this->dptnsrl;
    }

    /**
     * @param mixed $dptnsrl
     */
    public function setDptnsrl($dptnsrl): void
    {
        $this->dptnsrl = $dptnsrl;
    }

    /**
     * @return mixed
     */
    public function getDplatsrl()
    {
        return $this->dplatsrl;
    }

    /**
     * @param mixed $dplatsrl
     */
    public function setDplatsrl($dplatsrl): void
    {
        $this->dplatsrl = $dplatsrl;
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
     * @return mixed
     */
    public function getSortr()
    {
        return $this->sortr;
    }

    /**
     * @param mixed $sortr
     */
    public function setSortr($sortr): void
    {
        $this->sortr = $sortr;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'SubNo' => $this->subno,
            'tye' => $this->tye,
            'AclAmtBgn' => $this->aclamtbgn,
            'AclAmtEnd' => $this->aclamtend,
            'bsiTye' => $this->bsitye,
            'DTrdType' => $this->dtrdtype,
            'DPtnSrl' => $this->dptnsrl,
            'DPlatSrl' => $this->dplatsrl,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag,
            'SortR' => $this->sortr,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}