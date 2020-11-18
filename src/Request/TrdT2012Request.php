<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT2012Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T2012";
    /**
     * @var string 原出入金交易的合作方交易 流水号
     */
    protected $orgsrl;

    /**
     * @return mixed
     */
    public function getOrgsrl()
    {
        return $this->orgsrl;
    }

    /**
     * @param mixed $orgsrl
     */
    public function setOrgsrl($orgsrl): void
    {
        $this->orgsrl = $orgsrl;
    }

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