<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/21
 * Time: 下午2:36
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4691Response extends BaseResponse
{
    /**
     * @var string
     */
    protected $userName;
    /**
     * @var int 可用账户余额
     */
    protected $balance;
    /**
     * @var int 到账余额
     */
    protected $receivedBalance;
    /**
     * @var int 在途余额
     */
    protected $receivableBalance;
    /**
     * @var int 冻结账户余额
     */
    protected $frozenAmount;
    /**
     * @var int 账户状态：
     * 10=正常
     * 30=冻结
     * 35=止付
     */
    protected $status;
    /**
     * @var int
     */
    protected $userType;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getReceivedBalance(): int
    {
        return $this->receivedBalance;
    }

    /**
     * @return int
     */
    public function getReceivableBalance(): int
    {
        return $this->receivableBalance;
    }

    /**
     * @return int
     */
    public function getFrozenAmount(): int
    {
        return $this->frozenAmount;
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
    public function getUserType(): int
    {
        return $this->userType;
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
            $this->userName = ArrayUtil::get('UserName', $this->responseBody);
            $this->balance = intval(ArrayUtil::get('Balance', $this->responseBody));
            $this->receivedBalance = intval(ArrayUtil::get('ReceivedBalance', $this->responseBody));
            $this->receivableBalance = intval(ArrayUtil::get('ReceivableBalance', $this->responseBody));
            $this->frozenAmount = intval(ArrayUtil::get('FrozenAmount', $this->responseBody));
            $this->userType = intval(ArrayUtil::get('UserType', $this->responseBody));
        }
    }
}