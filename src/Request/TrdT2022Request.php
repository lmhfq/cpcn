<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT2022Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T2022";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $bkacc_accno;

    public $bkacc_accnm;

    public $amt_aclamt;

    public $amt_feeamt;

    public $amt_tamt;

    public $amt_ccycd;

    public $usage;

    public $trsflag;

    public $balflag;

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
            'BkAcc' => [
                'AccNo' => $this->bkacc_accno,
                'AccNm' => $this->bkacc_accnm,
            ],
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'FeeAmt' => $this->amt_feeamt,
                'TAmt' => $this->amt_tamt,
                'CcyCd' => $this->amt_ccycd,
            ],
            'Usage' => $this->usage,
            'TrsFlag' => $this->trsflag,
            'BalFlag' => $this->balflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}