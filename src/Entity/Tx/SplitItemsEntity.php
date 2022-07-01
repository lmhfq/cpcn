<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:31
 */

namespace Lmh\Cpcn\Entity\Tx;


class SplitItemsEntity
{
    /**
     * @var string 分账结算交易流水号
     */
    protected $splitTxSn;
    /**
     * @var string 分账用户 ID
     * 个人企业会员上送注册会员 ID，机构会员上送机构 ID
     */
    protected $spLitUserId;
    /**
     * @var string 分账账户号码
     */
    protected $splitAccountNumber;
    /**
     * @var string 绑定流水号
     */
    protected $splitBindingTxSn;
    /**
     * @var string 银行账户类型
     * 11=个人账户
     * 12=企业账户
     */
    protected $splitBankAccountType;
    /**
     * @var int 结算金额
     * 单位：分，不可为空或 0
     */
    protected $splitAmount;
    /**
     * @var int 冻结金额
     * 单位：分，分账到个人企业个体户支付账户并冻结时必填
     */
    protected $splitFrozenAmount;
    /**
     * @var string 分账备注
     */
    protected $note;
    /**
     * @var int
     */
    protected $splitFee;
    /**
     * @var int
     */
    protected $splitPayFee;
    /**
     * @var int 结算金额
     * 单位：分，不可为空或 0
     */
    protected $splitStatus;
    /**
     * @var string
     */
    protected $splitResponseTime;

    /**
     * @return string
     */
    public function getSplitTxSn(): string
    {
        return $this->splitTxSn;
    }

    /**
     * @param string $splitTxSn
     */
    public function setSplitTxSn(string $splitTxSn): void
    {
        $this->splitTxSn = $splitTxSn;
    }

    /**
     * @return string
     */
    public function getSpLitUserId(): string
    {
        return $this->spLitUserId;
    }

    /**
     * @param string $spLitUserId
     */
    public function setSpLitUserId(string $spLitUserId): void
    {
        $this->spLitUserId = $spLitUserId;
    }

    /**
     * @return string
     */
    public function getSplitAccountNumber(): ?string
    {
        return $this->splitAccountNumber;
    }

    /**
     * @param string $splitAccountNumber
     */
    public function setSplitAccountNumber(string $splitAccountNumber): void
    {
        $this->splitAccountNumber = $splitAccountNumber;
    }

    /**
     * @return string
     */
    public function getSplitBindingTxSn(): string
    {
        return $this->splitBindingTxSn;
    }

    /**
     * @param string $splitBindingTxSn
     */
    public function setSplitBindingTxSn(string $splitBindingTxSn): void
    {
        $this->splitBindingTxSn = $splitBindingTxSn;
    }

    /**
     * @return string
     */
    public function getSplitBankAccountType(): string
    {
        return $this->splitBankAccountType;
    }

    /**
     * @param string $splitBankAccountType
     */
    public function setSplitBankAccountType(string $splitBankAccountType): void
    {
        $this->splitBankAccountType = $splitBankAccountType;
    }

    /**
     * @return int
     */
    public function getSplitAmount(): int
    {
        return $this->splitAmount;
    }

    /**
     * @param int $splitAmount
     */
    public function setSplitAmount(int $splitAmount): void
    {
        $this->splitAmount = $splitAmount;
    }

    /**
     * @return int
     */
    public function getSplitFrozenAmount(): int
    {
        return $this->splitFrozenAmount;
    }

    /**
     * @param int $splitFrozenAmount
     */
    public function setSplitFrozenAmount(int $splitFrozenAmount): void
    {
        $this->splitFrozenAmount = $splitFrozenAmount;
    }

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note ;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return int
     */
    public function getSplitStatus(): int
    {
        return $this->splitStatus;
    }

    /**
     * @return int
     */
    public function getSplitFee(): int
    {
        return $this->splitFee;
    }

    /**
     * @param int $splitFee
     */
    public function setSplitFee(int $splitFee): void
    {
        $this->splitFee = $splitFee;
    }

    /**
     * @return int
     */
    public function getSplitPayFee(): int
    {
        return $this->splitPayFee;
    }

    /**
     * @param int $splitPayFee
     */
    public function setSplitPayFee(int $splitPayFee): void
    {
        $this->splitPayFee = $splitPayFee;
    }

    /**
     * @param int $splitStatus
     */
    public function setSplitStatus(int $splitStatus): void
    {
        $this->splitStatus = $splitStatus;
    }

    /**
     * @return string
     */
    public function getSplitResponseTime(): string
    {
        return $this->splitResponseTime;
    }

    /**
     * @param string $splitResponseTime
     */
    public function setSplitResponseTime(string $splitResponseTime): void
    {
        $this->splitResponseTime = $splitResponseTime;
    }
}