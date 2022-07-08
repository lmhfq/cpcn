<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/7/8
 * Time: 上午10:11
 */

namespace Lmh\Cpcn\Entity\Tx;


use Lmh\Cpcn\Support\ArrayTrait;

class CapitalItemEntity
{
    use ArrayTrait;
    /**
     * @var string
     */
    protected $txSn;
    /**
     * @var integer
     */
    protected $txType;
    /**
     * @var string
     */
    protected $txTime;
    /**
     * @var integer 收支标识： 10=收 20=支 30=冻结 40=冲正 50=在途结转 60=解冻
     */
    protected $operation;
    /**
     * @var integer 发生额
     */
    protected $amount;
    /**
     * @var integer 期末在途余额
     */
    protected $receivable;
    /**
     * @var integer 冻结余额
     */
    protected $frozen;
    /**
     * @var integer 期末可用余额
     */
    protected $balance;
    /**
     * @var string
     */
    protected $remark;

    /**
     * @return ?string
     */
    public function getTxSn(): ?string
    {
        return $this->txSn;
    }

    /**
     * @param string|null $txSn
     */
    public function setTxSn(?string $txSn): void
    {
        $this->txSn = $txSn;
    }


    /**
     * @return int
     */
    public function getTxType(): int
    {
        return $this->txType;
    }

    /**
     * @param int $txType
     */
    public function setTxType(int $txType): void
    {
        $this->txType = $txType;
    }

    /**
     * @return string
     */
    public function getTxTime(): string
    {
        return $this->txTime;
    }

    /**
     * @param string $txTime
     */
    public function setTxTime(string $txTime): void
    {
        $this->txTime = $txTime;
    }

    /**
     * @return int
     */
    public function getOperation(): int
    {
        return $this->operation;
    }

    /**
     * @param int $operation
     */
    public function setOperation(int $operation): void
    {
        $this->operation = $operation;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getReceivable(): int
    {
        return $this->receivable;
    }

    /**
     * @param int $receivable
     */
    public function setReceivable(int $receivable): void
    {
        $this->receivable = $receivable;
    }

    /**
     * @return int
     */
    public function getFrozen(): int
    {
        return $this->frozen;
    }

    /**
     * @param int $frozen
     */
    public function setFrozen(int $frozen): void
    {
        $this->frozen = $frozen;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $balance
     */
    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return ?string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @param string|null $remark
     */
    public function setRemark(?string $remark): void
    {
        $this->remark = $remark;
    }

}