<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT1038Response extends TrdBaseResponse
{
    /**
     * @var string
     */
    protected $stat;
    /**
     * @var string 失败原因
     */
    protected $option;
    /**
     * @var string
     */
    protected $srl_ptnsrl;
    /**
     * @var string
     */
    protected $srl_platsrl;

    /**
     * @return string
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * @param mixed $stat
     */
    public function setStat($stat): void
    {
        $this->stat = $stat;
    }

    /**
     * @return string
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption(string $option): void
    {
        $this->option = $option;
    }

    /**
     * @return string
     */
    public function getSrlPtnsrl(): string
    {
        return $this->srl_ptnsrl;
    }

    /**
     * @param string $srl_ptnsrl
     */
    public function setSrlPtnsrl($srl_ptnsrl): void
    {
        $this->srl_ptnsrl = $srl_ptnsrl;
    }

    /**
     * @return string
     */
    public function getSrlPlatsrl(): string
    {
        return $this->srl_platsrl;
    }

    /**
     * @param string $srl_platsrl
     */
    public function setSrlPlatsrl(string $srl_platsrl): void
    {
        $this->srl_platsrl = $srl_platsrl;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->stat = ArrayUtil::get('Stat', $this->responseData);
            $this->option = ArrayUtil::get('Opion', $this->responseData);
            $srl = ArrayUtil::get('Srl', $this->responseData, []);
            $this->srl_ptnsrl = ArrayUtil::get('PtnSrl', $srl);
            $this->srl_platsrl = ArrayUtil::get('PlatSrl', $srl);
            $this->option = $cltAcc = ArrayUtil::get('Opion', $this->responseData);
        }
    }
}