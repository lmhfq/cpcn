<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3001Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3001";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $amt_aclamt;

    public $amt_ccycd;

    public $trsflag;

    public $usage;

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
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'CcyCd' => $this->amt_ccycd,
            ],
            'TrsFlag' => $this->trsflag,
            'Usage' => $this->usage,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}