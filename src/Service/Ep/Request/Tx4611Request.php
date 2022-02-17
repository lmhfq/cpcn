<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:56
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Constant\Operation;
use Lmh\Cpcn\Constant\UserType;
use Lmh\Cpcn\Entity\Tx\BankAccountEntity;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class Tx4611Request extends BaseRequest
{
    protected $txCode = '4611';
    /**
     * @var string 收款用户ID
     * 仅支持实名企业用户
     */
    protected $payeeUserId;
    /**
     * @var int 卡类型
     * 10=借记账户
     * 20=贷记账户
     */
    protected $bankCardType = 10;
    /**
     * @var int 操作标识
     * 10=绑卡
     * 20=解绑
     * 30=升级
     */
    protected $operationFlag = 10;
    /**
     * @var string 绑卡升级交易流水号
     */
    protected $upgradeTxSn;
    /**
     * @var string 绑卡验证方式：
     * 10=短信验证-快捷绑卡
     * 20=小额打款-提现绑卡
     * 30=静默绑卡-提现绑卡
     * 个人银行账户支持全部验证方式，默认为 10-短信验证-快捷绑卡；
     * 企业银行账户仅支持 20、30 验证方式，默认为 20-小额打款-提现绑卡
     */
    protected $bindingWay = 10;
    /**
     * @var int 证件类型
     * 0=身份证
     * OperationFlag=10 时和个人时必填
     */
    protected $credentialType = 0;
    /**
     * @var string 身份证号
     * OperationFlag=10 时和个人时必填
     */
    protected $credentialNumber;
    /**
     * @var BankAccountEntity
     * 当收款账户类型为 30-银行账户时，
     */
    protected $bankAccount;
    /**
     * @var int 转账充值开通标识：
     * 0=不开通
     * 1=开通
     */
    protected $transferChargeFlag = 0;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';

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
    public function getBankCardType(): int
    {
        return $this->bankCardType;
    }

    /**
     * @param int $bankCardType
     */
    public function setBankCardType(int $bankCardType): void
    {
        $this->bankCardType = $bankCardType;
    }

    /**
     * @return int
     */
    public function getOperationFlag(): int
    {
        return $this->operationFlag;
    }

    /**
     * @param int $operationFlag
     */
    public function setOperationFlag(int $operationFlag): void
    {
        $this->operationFlag = $operationFlag;
    }

    /**
     * @return string
     */
    public function getBindingWay()
    {
        return $this->bindingWay;
    }

    /**
     * @param string $bindingWay
     */
    public function setBindingWay($bindingWay): void
    {
        $this->bindingWay = $bindingWay;
    }

    /**
     * @return int
     */
    public function getCredentialType(): int
    {
        return $this->credentialType;
    }

    /**
     * @param int $credentialType
     */
    public function setCredentialType(int $credentialType): void
    {
        $this->credentialType = $credentialType;
    }

    /**
     * @return string
     */
    public function getCredentialNumber(): string
    {
        return $this->credentialNumber;
    }

    /**
     * @param string $credentialNumber
     */
    public function setCredentialNumber(string $credentialNumber): void
    {
        $this->credentialNumber = $credentialNumber;
    }

    /**
     * @return int
     */
    public function getTransferChargeFlag(): int
    {
        return $this->transferChargeFlag;
    }

    /**
     * @param int $transferChargeFlag
     */
    public function setTransferChargeFlag(int $transferChargeFlag): void
    {
        $this->transferChargeFlag = $transferChargeFlag;
    }

    /**
     * @return string
     */
    public function getNoticeUrl(): string
    {
        return $this->noticeUrl ?: '';
    }

    /**
     * @param string $noticeUrl
     */
    public function setNoticeUrl(string $noticeUrl): void
    {
        $this->noticeUrl = $noticeUrl;
    }

    /**
     * @return string
     */
    public function getUpgradeTxSn(): string
    {
        return $this->upgradeTxSn;
    }

    /**
     * @param string $upgradeTxSn
     */
    public function setUpgradeTxSn(string $upgradeTxSn): void
    {
        $this->upgradeTxSn = $upgradeTxSn;
    }

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

    /**
     * @throws InvalidConfigException
     * @author lmh
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'BindingTxSN' => $this->bankAccount->getBindingTxSn(),
            'UserID' => $this->getUserId(),
            'OperationFlag' => $this->getOperationFlag(),
        ];
        $body['BankAccountType'] = $this->bankAccount->getBankAccountType();
        $body['BindingWay'] = $this->getBindingWay();
        switch ($this->operationFlag) {
            case Operation::FLAG_BIND:
                if ($this->bankAccount->getBankAccountType() == UserType::INDIVIDUAL) {
                    $body['BankCardType'] = $this->getBankCardType();
                    $body['CredentialType'] = $this->getCredentialType();
                    $body['CredentialNumber'] = $this->getCredentialNumber();
                    $body['BankPhoneNumber'] = $this->bankAccount->getBankPhoneNumber();
                } else {
                    $body['BranchName'] = $this->bankAccount->getBranchName();
                    $body['Province'] = $this->bankAccount->getProvince();
                    $body['City'] = $this->bankAccount->getCity();
                }
                $body['BankID'] = $this->bankAccount->getBankId();
                $body['BankAccountName'] = $this->bankAccount->getBankAccountName();
                $body['BankAccountNumber'] = $this->bankAccount->getBankAccountNumber();
                break;
            case Operation::FLAG_UNBIND:
                break;
            case Operation::FLAG_UPGRADE;
                $body['UpgradeTxSN'] = $this->getUpgradeTxSn();
                break;
        }
        $body['TransferChargeFlag'] = $this->getTransferChargeFlag();
        $body['NoticeURL'] = $this->getNoticeUrl();
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}