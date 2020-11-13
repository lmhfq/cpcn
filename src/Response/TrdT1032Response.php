<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT1032Response extends TrdBaseResponse
{
    /**
     * @var string 0 激活/验证处理中 1 激活/验证成功 2 验证成功，需人工审核激活 4 验证成功，需要再次验证 打款金额 9 激活/验证失败
     */
    protected $state;
    /**
     * @var string
     */
    protected $amount;
    /**
     * @var string
     */
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
        if ($this->msghd_rspcode == ResponseCode::SUCCESS || $this->msghd_rspcode == ResponseCode::E3010) {
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->amount = ArrayUtil::get('Amount', $this->responseData);
            $this->actideadline = ArrayUtil::get('ActiDeadline', $this->responseData);
        }
    }
}