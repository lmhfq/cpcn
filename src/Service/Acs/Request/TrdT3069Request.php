<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3069Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3069";

    protected $billinfo_billno;

    /**
     * @return mixed
     */
    public function getBillinfoBillno()
    {
        return $this->billinfo_billno;
    }

    /**
     * @param mixed $billinfo_billno
     */
    public function setBillinfoBillno($billinfo_billno): void
    {
        $this->billinfo_billno = $billinfo_billno;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'billInfo' => [
                'BillNo' => $this->billinfo_billno
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}