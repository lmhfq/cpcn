<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3069Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3069";

    public $billinfo_billno;

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