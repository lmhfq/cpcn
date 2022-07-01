<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4616Response extends BaseResponse
{
    protected $parentUserId;
    /**
     * @var int 状态:
     * 10=已受理
     * 15=待短信验证
     * 16=审核通过
     * 17=待被动打款验证
     * 18=被动已打款待验证
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $status;

    /**
     * @return mixed
     */
    public function getParentUserId()
    {
        return $this->parentUserId;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
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
            $this->parentUserId = ArrayUtil::get('ParentUserID', $this->responseBody);
        }
    }
}