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
use Lmh\Cpcn\Support\Xml;

class Tx4611Request extends BaseRequest
{
    protected $txCode = '4611';
    /**
     * @var string 银行账户绑定流水号
     */
    protected $bindingTxSn;
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
    protected $upgradeTxSN;
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
     * @var string 绑定银行 ID
     */
    protected $bankId;
    /**
     * @var int 账户类型：
     * 11=个人账户
     * 12=企业账户
     * OperationFlag=10 时必填
     */
    protected $bankAccountType;
    /**
     * @var string 银行账户名称
     * OperationFlag=10 时必填
     */
    protected $bankAccountName;
    /**
     * @var string 银行账户号码
     * OperationFlag=10 时必填
     */
    protected $bankAccountNumber;
    /**
     * @var string 银行卡预留手机号码
     * 个人用户开户绑卡时必填；
     */
    protected $bankPhoneNumber;
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
     * @var string 分支行名称
     * 企业用户开户绑卡时必填；
     */
    protected $city;
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
    public function getUpgradeTxSN(): string
    {
        return $this->upgradeTxSN;
    }

    /**
     * @param string $upgradeTxSN
     */
    public function setUpgradeTxSN(string $upgradeTxSN): void
    {
        $this->upgradeTxSN = $upgradeTxSN;
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
        return $this->bankPhoneNumber;
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
        return $this->branchName;
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
        return $this->province;
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
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
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
        return $this->noticeUrl;
    }

    /**
     * @param string $noticeUrl
     */
    public function setNoticeUrl(string $noticeUrl): void
    {
        $this->noticeUrl = $noticeUrl;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'BindingTxSN' => $this->getBindingTxSn(),
            'UserID' => $this->getUserId(),
            'OperationFlag' => $this->getOperationFlag(),
        ];
        $body['BankAccountType'] = $this->getBankAccountType();
        $body['BindingWay'] = $this->getBindingWay();
        switch ($this->operationFlag) {
            case Operation::FLAG_BIND:
                if ($this->bankAccountType == UserType::INDIVIDUAL) {
                    $body['BankCardType'] = $this->getBankCardType();
                    $body['CredentialType'] = $this->getCredentialType();
                    $body['CredentialNumber'] = $this->getCredentialNumber();
                    $body['BankPhoneNumber'] = $this->getBankPhoneNumber();
                } else {
                    $body['BranchName'] = $this->getBranchName();
                    $body['Province'] = $this->getProvince();
                    $body['City'] = $this->getCity();
                }
                $body['BankID'] = $this->getBankId();
                $body['BankAccountName'] = $this->getBankAccountName();
                $body['BankAccountNumber'] = $this->getBankAccountNumber();
                break;
            case Operation::FLAG_UNBIND:
                break;
            case Operation::FLAG_UPGRADE;
                $body['UpgradeTxSN'] = $this->getUpgradeTxSN();
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