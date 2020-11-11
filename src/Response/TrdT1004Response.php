<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT1004Response extends TrdBaseResponse
{
    protected $state;

    protected $actiinfo;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getActiinfo()
    {
        return $this->actiinfo;
    }

    /**
     * @param mixed $actiinfo
     */
    public function setActiinfo($actiinfo): void
    {
        $this->actiinfo = $actiinfo;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->state = ArrayUtil::get('Amount', $this->responseData);
            $this->actiinfo = ArrayUtil::get('ActiInfo', $this->responseData);
        }
    }
}