<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT4002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4002";

    public $qpy_accno;

    public $qpy_smsmsg;
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
                'SMSMsg' => $this->qpy_smsmsg
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}