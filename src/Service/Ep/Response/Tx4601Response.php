<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:29
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4601Response extends BaseResponse
{
    /**
     * @var int 状态:
     * 10=受理成功
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $status;
    /**
     * @var string
     */
    protected $dBank;
    /**
     * @var int 绑卡状态:
     * 10=已受理
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $bindingStatus;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDBank(): string
    {
        return $this->dBank;
    }

    /**
     * @param string $dBank
     */
    public function setDBank(string $dBank): void
    {
        $this->dBank = $dBank;
    }

    /**
     * @return int
     */
    public function getBindingStatus(): int
    {
        return $this->bindingStatus;
    }

    /**
     * @param int $bindingStatus
     */
    public function setBindingStatus(int $bindingStatus): void
    {
        $this->bindingStatus = $bindingStatus;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->userId = ArrayUtil::get('UserID', $this->responseBody);
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
        }
    }
}