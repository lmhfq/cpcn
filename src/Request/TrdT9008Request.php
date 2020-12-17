<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT9008Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9008";

    public $quydt;

    public $quystdt;

    public $quyenddt;

    public $subno;

    public $tye;

    public $aclamtbgn;

    public $aclamtend;

    public $bsitye;

    public $dtrdtype;

    public $dptnsrl;

    public $dplatsrl;

    public $pagsiz;

    public $curpag;

    public $sortr;

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