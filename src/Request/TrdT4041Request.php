<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4041Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4041";

    public $trsflag;

    public $dtrcd;

    public $dptnsrl;

    public $usage;

    public $amt_aclamt;

    public $amt_ccycd;

    public $amt_payfee;

    public $amt_payeefee;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'TrsFlag' => $this->trsflag,
            'DTrCd' => $this->dtrcd,
            'DPtnSrl' => $this->dptnsrl,
            'Usage' => $this->usage,
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'CcyCd' => $this->amt_ccycd,
                'PayFee' => $this->amt_payfee,
                'PayeeFee' => $this->amt_payeefee,
            ],
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}