<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT4005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4005";

    protected $qpy_ptnsrl;

    protected $qpy_smsmsg;

    /**
     * @return mixed
     */
    public function getQpyPtnsrl()
    {
        return $this->qpy_ptnsrl;
    }

    /**
     * @param mixed $qpy_ptnsrl
     */
    public function setQpyPtnsrl($qpy_ptnsrl): void
    {
        $this->qpy_ptnsrl = $qpy_ptnsrl;
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