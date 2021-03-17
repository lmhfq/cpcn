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

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->stat = ArrayUtil::get('Stat', $this->responseData);
            $this->option = ArrayUtil::get('Opion', $this->responseData);
            $srl = ArrayUtil::get('Srl', $this->responseData, []);
            $this->srl_ptnsrl = ArrayUtil::get('PtnSrl', $srl);
            $this->srl_platsrl = ArrayUtil::get('PlatSrl', $srl);
        }
    }
}