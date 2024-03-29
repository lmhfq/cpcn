<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9001Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9001";

    public $quydt;

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
            'QuyDt' => $this->quydt,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}