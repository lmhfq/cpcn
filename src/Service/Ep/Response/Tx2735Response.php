<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx2735Response extends BaseResponse
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
     * @var string|null 商户号
     */
    protected $merchantId;
    /**
     * @var string
     */
    protected $responseTime;
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
     * @return int
     */
    public function getAuthStatus(): int
    {
        return $this->authStatus;
    }

    /**
     * @param int $authStatus
     */
    public function setAuthStatus(int $authStatus): void
    {
        $this->authStatus = $authStatus;
    }

    /**
     * @return string
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getResponseTime(): ?string
    {
        return $this->responseTime;
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
            $this->authStatus = intval(ArrayUtil::get('AuthStatus', $this->responseBody));
            $this->merchantId = intval(ArrayUtil::get('MerchantID', $this->responseBody));
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
        }
    }
}
