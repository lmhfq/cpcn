<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT1115Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1115";

    public $bkacc_accno;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'BkAcc' => [
                'AccNo' => $this->bkacc_accno,
            ],
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}