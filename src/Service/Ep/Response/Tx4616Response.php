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
     10=已受理 15=待短信验证 16=审核通过 17=待被动打款验 证18=被动已打款待 验证20=处理中 28=待账户验证 29=审核中 30=成功 40=失败
     */
    protected $status;
    /**
     * @var int|null 绑卡状态:10=已受理 20=处理中 30=成功 40=失败
     * 交易类型为 4601-开户时， 业务类型为开户绑卡时出现且 非空；
     */
    protected $bindingStatus;
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