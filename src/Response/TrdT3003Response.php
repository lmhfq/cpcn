<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT3003Response extends TrdBaseResponse
{
    protected $state;
    protected $opion;

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
    public function getOpion()
    {
        return $this->opion;
    }

    /**
     * @param mixed $opion
     */
    public function setOpion($opion): void
    {
        $this->opion = $opion;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->opion = ArrayUtil::get('State', $this->responseData);
            $this->state = ArrayUtil::get('Opion', $this->responseData);
        }
    }
}