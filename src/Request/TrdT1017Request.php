<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1017Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1017";

    public $qryflag;

    public $bkid;

    public $openbkcd;

    public $openbknm;

    public $citycd;

    public $querynum;

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