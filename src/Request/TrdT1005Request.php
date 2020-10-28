<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1005";

    public $cltacc_subno;

    public $cltacc_cltnm;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'CltAcc' => [
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}