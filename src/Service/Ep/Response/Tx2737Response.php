<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx2737Response extends BaseResponse
{
    /**
     * @var int 进件修改状态： 40=成功 50=失败
     */
    protected $status;
    /**
     * @var string
     */
    protected $modifyApplyNo;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }


    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->modifyApplyNo = ArrayUtil::get('modifyApplyNo', $this->responseBody);
        }
    }
}