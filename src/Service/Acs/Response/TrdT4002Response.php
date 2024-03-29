<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT4002Response extends TrdBaseResponse
{
    protected $qpy_smsstate;
    protected $qpy_state;
    protected $qpy_opion;

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

    /**
     * @return mixed
     */
    public function getQpyOpion()
    {
        return $this->qpy_opion;
    }

    /**
     * @param mixed $qpy_opion
     */
    public function setQpyOpion($qpy_opion): void
    {
        $this->qpy_opion = $qpy_opion;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $qpy = ArrayUtil::get('Qpy', $this->responseData, []);
            $this->qpy_smsstate = ArrayUtil::get('SMSState', $qpy);
            $this->qpy_state = ArrayUtil::get('State', $qpy);
            $this->qpy_opion = ArrayUtil::get('Opion', $qpy);
        }
    }
}