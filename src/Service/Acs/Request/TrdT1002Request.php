<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1002";
    /**
     * @var string 开户时合作方交易流水号
     */
    protected $srcsrl;

    /**
     * @return mixed
     */
    public function getSrcsrl()
    {
        return $this->srcsrl;
    }

    /**
     * @param mixed $srcsrl
     */
    public function setSrcsrl($srcsrl): void
    {
        $this->srcsrl = $srcsrl;
    }

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