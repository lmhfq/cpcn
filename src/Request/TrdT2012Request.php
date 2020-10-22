<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT2012Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T2012";

    public $orgsrl;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'OrgSrl' => $this->orgsrl
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}