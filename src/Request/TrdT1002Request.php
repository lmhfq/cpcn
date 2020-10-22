<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT1002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1002";

    public $srcsrl;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'SrcSrl' => $this->srcsrl
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}