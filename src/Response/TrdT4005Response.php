<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT4005Response extends TrdBaseResponse
{
    protected $qpy_smsstate;
    protected $qpy_state;

    /**
     * @return mixed
     */
    public function getQpySmsstate()
    {
        return $this->qpy_smsstate;
    }

    /**
     * @param mixed $qpy_smsstate
     */
    public function setQpySmsstate($qpy_smsstate): void
    {
        $this->qpy_smsstate = $qpy_smsstate;
    }

    /**
     * @return mixed
     */
    public function getQpyState()
    {
        return $this->qpy_state;
    }

    /**
     * @param mixed $qpy_state
     */
    public function setQpyState($qpy_state): void
    {
        $this->qpy_state = $qpy_state;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $qpy = ArrayUtil::get('Qpy', $this->responseData, []);
            if ($qpy) {
                $this->qpy_smsstate = ArrayUtil::get('SMSState', $qpy);
                $this->qpy_state = ArrayUtil::get('State', $qpy);
            }
        }
    }
}