<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4005";

    public $qpy_ptnsrl;

    public $qpy_smsmsg;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'Qpy' => [
                'PtnSrl' => $this->qpy_ptnsrl,
                'SMSMsg' => $this->qpy_smsmsg
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}