<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9005";

    public $subno;

    public $pagsiz;

    public $curpag;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'SubNo' => $this->subno,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}