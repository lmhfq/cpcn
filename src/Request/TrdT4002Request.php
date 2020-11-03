<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4002";

    protected $qpy_accno;

    protected $qpy_smsmsg;

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
     * @return mixed
     */
    public function getQpySmsmsg()
    {
        return $this->qpy_smsmsg;
    }

    /**
     * @param mixed $qpy_smsmsg
     */
    public function setQpySmsmsg($qpy_smsmsg): void
    {
        $this->qpy_smsmsg = $qpy_smsmsg;
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
                'SMSMsg' => $this->qpy_smsmsg
            ]
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}