<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT1008Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T1008";

    protected $qryflag;

    /**
     * @return mixed
     */
    public function getQryflag()
    {
        return $this->qryflag;
    }

    /**
     * @param mixed $qryflag
     */
    public function setQryflag($qryflag): void
    {
        $this->qryflag = $qryflag;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'QryFlag' => $this->qryflag
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}