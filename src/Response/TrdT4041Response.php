<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\ResponseCode;

class TrdT4041Response extends TrdBaseResponse
{
    protected $state;
    protected $resttime;
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
    public function getResttime()
    {
        return $this->resttime;
    }

    /**
     * @param mixed $resttime
     */
    public function setResttime($resttime): void
    {
        $this->resttime = $resttime;
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
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->resttime = ArrayUtil::get('RestTime', $this->responseData);
            $this->opion = ArrayUtil::get('Opion', $this->responseData);
        }
    }
}