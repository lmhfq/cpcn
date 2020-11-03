<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4003Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4003";

    protected $qpy_accno;

    /**
     * @return mixed
     */
    public function getQpyAccno()
    {
        return $this->qpy_accno;
    }

    /**
     * @param mixed $qpy_accno
     */
    public function setQpyAccno($qpy_accno): void
    {
        $this->qpy_accno = $qpy_accno;
    }

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