<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT3004Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3004";

    public $billinfo_psubno;

    public $billinfo_pnm;

    public $billinfo_rsubno;

    public $billinfo_rcltnm;

    public $billinfo_orderno;

    public $billinfo_billno;

    public $billinfo_aclamt;

    public $billinfo_payfee;

    public $billinfo_payeefee;

    public $billinfo_ccycd;

    public $billinfo_usage;

    public $billinfo_goodsmess;

    public $trsflag;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'billInfo' => [
                'PSubNo' => $this->billinfo_psubno,
                'PNm' => $this->billinfo_pnm,
                'RSubNo' => $this->billinfo_rsubno,
                'RCltNm' => $this->billinfo_rcltnm,
                'OrderNo' => $this->billinfo_orderno,
                'BillNo' => $this->billinfo_billno,
                'AclAmt' => $this->billinfo_aclamt,
                'PayFee' => $this->billinfo_payfee,
                'PayeeFee' => $this->billinfo_payeefee,
                'CcyCd' => $this->billinfo_ccycd,
                'Usage' => $this->billinfo_usage,
                'GoodsMess' => $this->billinfo_goodsmess,
            ],
            'TrsFlag' => $this->trsflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}