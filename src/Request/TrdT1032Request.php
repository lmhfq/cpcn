<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT1032Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1032";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $pbusitype;

    public $actiflag;

    public $actiinfo;

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
            'PBusiType' => $this->pbusitype,
            'ActiFlag' => $this->actiflag,
            'ActiInfo' => $this->actiinfo,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}