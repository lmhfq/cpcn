<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/15
 * Time: 上午9:06
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Entity\Tx\BankAccountEntity;
use Lmh\Cpcn\Support\Xml;

class Tx4645Request extends BaseRequest
{
    protected $txCode = '4645';
    /**
     * @var int 到账类型
     * 10=T+1
     * 20=D0
     */
    protected $arrivalType = 20;
    /**
     * @var int 付款账户类型
     * 10-结算标识(预留)
     * 20-用户账户
     */
    protected $payerAccountType = 20;
    /**
     * @var string 收款用户 ID
     * 当收款账户类型为 20-用户账户及 30-银行账户时必填
     */
    protected $payerUserId;
    /**
     * @var string 付款账户号码
     * 注：当付款账户类型为 10-结算标识时，为结算标识；(预留)当付款账户类型为 10-结算标识时，为结算标识；
     */
    protected $payerAccountNumber;
    /**
     * @var int 收款账户类型
     * 10-结算标识(预留)
     * 20-用户账户
     * 30-银行账户
     */
    protected $payeeAccountType = 20;
    /**
     * @var string 收款用户 ID
     */
    protected $payeeUserId;
    /**
     * @var BankAccountEntity
     * 当收款账户类型为 30-银行账户时，
     */
    protected $bankAccount;
    /**
     * @var int 交易金额
     * 单位：分
     */
    protected $amount;
    /**
     * @var string 备注
     */
    protected $remark;

    /**
     * @return BankAccountEntity
     */
    public function getBankAccount(): BankAccountEntity
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccountEntity $bankAccount
     */
    public function setBankAccount(BankAccountEntity $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'ArrivalType' => $this->getArrivalType(),
            'PayerAccountType' => $this->getPayerAccountType(),
            'PayerUserID' => $this->getPayerUserId(),

            'PayeeAccountType' => $this->getPayeeAccountType(),
            'PayeeUserID' => $this->getPayeeUserId(),
            'Amount' => $this->getAmount(),
            'Remark' => $this->getRemark(),
        ];
        if ($this->payerAccountType == 10) {
            $body['PayerAccountNumber'] = $this->getPayerAccountNumber();
        }
        if ($this->bankAccount) {
            if ($this->bankAccount->getBindingTxSn()) {
                $body['BindingTxSN'] = $this->bankAccount->getBindingTxSn();
            } else {
                $body['BankID'] = $this->bankAccount->getBankId();
                $body['BankAccountName'] = $this->bankAccount->getBankAccountName();
                $body['BankAccountNumber'] = $this->bankAccount->getBankAccountNumber();
                $body['BankAccountType'] = $this->bankAccount->getBankAccountType();
                $body['BranchName'] = $this->bankAccount->getBranchName();
                $body['Province'] = $this->bankAccount->getProvince();
                $body['City'] = $this->bankAccount->getCity();
            }
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }

    /**
     * @return int
     */
    public function getArrivalType(): int
    {
        return $this->arrivalType;
    }

    /**
     * @param int $arrivalType
     */
    public function setArrivalType(int $arrivalType): void
    {
        $this->arrivalType = $arrivalType;
    }

    /**
     * @return int
     */
    public function getPayerAccountType(): int
    {
        return $this->payerAccountType;
    }

    /**
     * @param int $payerAccountType
     */
    public function setPayerAccountType(int $payerAccountType): void
    {
        $this->payerAccountType = $payerAccountType;
    }

    /**
     * @return string
     */
    public function getPayerUserId(): string
    {
        return $this->payerUserId;
    }

    /**
     * @param string $payerUserId
     */
    public function setPayerUserId(string $payerUserId): void
    {
        $this->payerUserId = $payerUserId;
    }

    /**
     * @return int
     */
    public function getPayeeAccountType(): int
    {
        return $this->payeeAccountType;
    }

    /**
     * @param int $payeeAccountType
     */
    public function setPayeeAccountType(int $payeeAccountType): void
    {
        $this->payeeAccountType = $payeeAccountType;
    }

    /**
     * @return string
     */
    public function getPayeeUserId(): string
    {
        return $this->payeeUserId;
    }

    /**
     * @param string $payeeUserId
     */
    public function setPayeeUserId(string $payeeUserId): void
    {
        $this->payeeUserId = $payeeUserId;
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
     * @return string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    /**
     * @return string
     */
    public function getPayerAccountNumber(): string
    {
        return $this->payerAccountNumber;
    }

    /**
     * @param string $payerAccountNumber
     */
    public function setPayerAccountNumber(string $payerAccountNumber): void
    {
        $this->payerAccountNumber = $payerAccountNumber;
    }
}