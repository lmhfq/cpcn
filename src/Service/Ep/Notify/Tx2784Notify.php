<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx2784Notify extends TBaseNotify
{
    /**
     * @var int 认证状态：
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
     * @var string 小程序码图片，状态为 73/74/75/77 时返回
     */
    protected $qrcodeData;
    /**
     * @var string
     */
    protected $applyNo;


    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->qrcodeData = ArrayUtil::get('QrcodeData', $this->noticeBody);
        $this->applyNo = ArrayUtil::get('ApplyNo', $this->noticeBody);
    }

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
     * @return string
     */
    public function getQrcodeData(): ?string
    {
        return $this->qrcodeData;
    }

    /**
     * @param string $qrcodeData
     */
    public function setQrcodeData(string $qrcodeData): void
    {
        $this->qrcodeData = $qrcodeData;
    }

    /**
     * @return string
     */
    public function getApplyNo(): ?string
    {
        return $this->applyNo;
    }

    /**
     * @param string $applyNo
     */
    public function setApplyNo(string $applyNo): void
    {
        $this->applyNo = $applyNo;
    }

}