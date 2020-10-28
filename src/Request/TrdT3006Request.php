<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3006Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3006";

    public $billno;
    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'BillNo' => $this->billno
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}