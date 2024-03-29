<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3003Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3003";
    /**
     * @var string 原冻结/解冻交易的合作方 业务单号
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