<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午4:43
 */

namespace Lmh\Cpcn\Entity\Tx;


class BankAccountEntity
{
    /**
     * @var string 银行账户绑定流水号
     * 流水号前 17 位必须是时间戳
     */
    protected $bindingTxSn;
    /**
     * @var string 绑定银行 ID
     */
    protected $bankId;
    /**
     * @var int 账户类型：
     * 11=个人账户
     * 12=企业账户
     */
    protected $bankAccountType;
    /**
     * @var string 账户名称
     */
    protected $bankAccountName;
    /**
     * @var string 银行账户号码
     */
    protected $bankAccountNumber;
    /**
     * @var string 银行卡预留手机号码
     * 个人用户开户绑卡时，不填默认为开户手机号码
     */
    protected $bankPhoneNumber;
    /**
     * @var string 人民银行联行号
     */
    protected $cNAPSCode;
    /**
     * @var string 分支行名称
     * 企业用户开户绑卡时必填；
     */
    protected $branchName;
    /**
     * @var string 省份
     * 企业用户开户绑卡时必填；
     */
    protected $province;
    /**
     * @var string 城市
     * 企业用户开户绑卡时必填；
     */
    protected $city;

    /**
     * @return string
     */
    public function getCNAPSCode(): string
    {
        return $this->cNAPSCode ?: '';
    }

    /**
     * @param string $cNAPSCode
     */
    public function setCNAPSCode(string $cNAPSCode): void
    {
        $this->cNAPSCode = $cNAPSCode;
    }


    /**
     * @return string
     */
    public function getBindingTxSn(): string
    {
        return $this->bindingTxSn;
    }

    /**
     * @param string $bindingTxSn
     */
    public function setBindingTxSn(string $bindingTxSn): void
    {
        $this->bindingTxSn = $bindingTxSn;
    }

    /**
     * @return string
     */
    public function getBankId(): string
    {
        return $this->bankId;
    }

    /**
     * @param string $bankId
     */
    public function setBankId(string $bankId): void
    {
        $this->bankId = $bankId;
    }

    /**
     * @return int
     */
    public function getBankAccountType(): int
    {
        return $this->bankAccountType;
    }

    /**
     * @param int $bankAccountType
     */
    public function setBankAccountType(int $bankAccountType): void
    {
        $this->bankAccountType = $bankAccountType;
    }

    /**
     * @return string
     */
    public function getBankAccountName(): string
    {
        return $this->bankAccountName;
    }

    /**
     * @param string $bankAccountName
     */
    public function setBankAccountName(string $bankAccountName): void
    {
        $this->bankAccountName = $bankAccountName;
    }


    /**
     * @return string
     */
    public function getBankAccountNumber(): string
    {
        return $this->bankAccountNumber;
    }

    /**
     * @param string $bankAccountNumber
     */
    public function setBankAccountNumber(string $bankAccountNumber): void
    {
        $this->bankAccountNumber = $bankAccountNumber;
    }

    /**
     * @return string
     */
    public function getBankPhoneNumber(): string
    {
        return $this->bankPhoneNumber ?: '';
    }

    /**
     * @param string $bankPhoneNumber
     */
    public function setBankPhoneNumber(string $bankPhoneNumber): void
    {
        $this->bankPhoneNumber = $bankPhoneNumber;
    }

    /**
     * @return string
     */
    public function getBranchName(): string
    {
        return $this->branchName ?: '';
    }

    /**
     * @param string $branchName
     */
    public function setBranchName(string $branchName): void
    {
        $this->branchName = $branchName;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province ?: '';
    }

    /**
     * @param string $province
     */
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city ?: '';
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}