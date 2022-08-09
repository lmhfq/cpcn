<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx2782Response extends BaseResponse
{
    /**
     * @var int 申请状态：
     * 查询状态：
     * 10=处理中
     * 20=受理成功
     * 30=受理失败
     * 40=认证申请中
     * 50=认证申请成功
     * 60=认证申请失败
     * 71=审核中
     * 72=编辑中
     * 73=待确认联系信息
     * 74=待账户验证
     * 75=审核通过
     * 76=审核驳回
     * 77=已冻结
     * 78=已作废
     */
    protected $status;
    /**
     * @var string
     */
    protected $qrcodeData;

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
            $this->qrcodeData = ArrayUtil::get('QrcodeData', $this->responseBody);
        }
    }
}