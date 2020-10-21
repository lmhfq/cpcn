<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT1008Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1008";

    public $qryflag;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'QryFlag' => $this->qryflag
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}