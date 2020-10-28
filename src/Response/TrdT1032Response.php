<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\ResponseCode;

class TrdT1032Response extends TrdBaseResponse
{
    protected $state;
    protected $amount;
    protected $actideadline;

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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getActideadline()
    {
        return $this->actideadline;
    }

    /**
     * @param mixed $actideadline
     */
    public function setActideadline($actideadline): void
    {
        $this->actideadline = $actideadline;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->amount = ArrayUtil::get('Amount', $this->responseData);
            $this->actideadline = ArrayUtil::get('ActiDeadline', $this->responseData);
        }
    }
}