<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT1004Response extends TrdBaseResponse
{
    protected $state;
    /**
     * @var string 1 绑定/变更/删除成功（此模式下无需验证） 2 申请绑定/变更成功，需人工审核激活 3 申请绑定/变更成功，需要短信验证 4 申请绑定/变更成功，需要打款验证（被动打款） 5 申请绑定/变更成功，需要异步网关页面激活
     */
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
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->actiinfo = ArrayUtil::get('ActiInfo', $this->responseData);
        }
    }
}