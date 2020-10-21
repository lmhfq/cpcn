<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT4003Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4003";

    public $qpy_accno;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'Qpy' => [
                'AccNo' => $this->qpy_accno,
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}