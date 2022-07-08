<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx2736Notify extends TBaseNotify
{
    /**
     * @var int 进件状态
     * 30 - 正反扫权限已获取，其他待处理
     * 40 - 全部权限已获取
     * 50 - 失败
     */
    protected $status;
    /**
     * @var int 商户号授权状态：（在接口进件支付方式为微信时返回）
     * 10=未授权
     * 20=已授权
     */
    protected $authStatus;
    /**
     * @var string
     */
    protected $bankSubBranchNo;
    /**
     * @var string
     */
    protected $applyNo;
    /**
     * @var string
     */
    protected $responseTime;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->authStatus = intval(ArrayUtil::get('AuthStatus', $this->noticeBody));
        $this->bankSubBranchNo = ArrayUtil::get('BankSubBranchNo', $this->noticeBody);
        $this->applyNo = ArrayUtil::get('ApplyNo', $this->noticeBody);
        $this->responseTime = ArrayUtil::get('ResponseTime', $this->noticeBody);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getAuthStatus(): int
    {
        return $this->authStatus;
    }

    /**
     * @return string
     */
    public function getBankSubBranchNo(): ?string
    {
        return $this->bankSubBranchNo;
    }

    /**
     * @return string
     */
    public function getApplyNo(): ?string
    {
        return $this->applyNo;
    }

    /**
     * @return string
     */
    public function getResponseTime(): ?string
    {
        return $this->responseTime;
    }
}