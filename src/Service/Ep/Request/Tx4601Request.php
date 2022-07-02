<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Constant\UserType;
use Lmh\Cpcn\Entity\Tx\AccountEntity;
use Lmh\Cpcn\Entity\Tx\BankAccountEntity;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class Tx4601Request extends BaseRequest
{

    protected $txCode = '4601';
    /**
     * @var int 用户类型：
      11=个人用户 12=企业用户 13=个体工商用户
     */
    protected $userType;
    /**
     * @var string 归属父级用户 ID
     */
    protected $parentUserId;
    /**
     * @var string 影印件采集交易流水号
     * 中金账户必填、电子账户模式众邦银行企业用户必填，4600 接口中的 TxSN；
     */
    protected $imageCollectionTxSn = '';
    /**
     * @var int 业务类型
     * 10=开户 20=开户并静默绑卡 21-开户并打款绑卡
     */
    protected $businessType = 10;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';
    /**
     * @var AccountEntity 开户选择域数据
     */
    protected $accountData;
    /**
     * @var BankAccountEntity 绑定银行账户域
     * 业务类型：20=开户并绑卡时必填
     */
    protected $bankAccount;

    /**
     * @return string
     */
    public function getParentUserId(): string
    {
        return $this->parentUserId;
    }

    /**
     * @param string $parentUserId
     */
    public function setParentUserId(string $parentUserId): void
    {
        $this->parentUserId = $parentUserId;
    }

    /**
     * @return AccountEntity
     */
    public function getAccountData(): ?AccountEntity
    {
        return $this->accountData;
    }

    /**
     * @param AccountEntity|null $accountData
     */
    public function setAccountData(?AccountEntity $accountData): void
    {
        $this->accountData = $accountData;
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
            'TxSN' => $this->getTxSn(),
            'UserID' => $this->getUserId(),
            'UserType' => $this->getUserType(),
        ];
        $body['BusinessType'] = $this->getBusinessType();
        $body['NoticeURL'] = $this->getNoticeUrl();
        switch ($this->userType) {
            case UserType::INDIVIDUAL:
                $body['Individual'] = [
                    'PhoneNumber' => $this->accountData->getContactNumber(),
                    'UserName' => $this->accountData->getUserName(),
                    'CredentialType' => $this->accountData->getCredentialType(),
                    'CredentialNumber' => $this->accountData->getCredentialNumber(),
                    'IssDate' => $this->accountData->getIssDate(),
                    'ExpiryDate' => $this->accountData->getExpiryDate(),
                    'IndAddress' => $this->accountData->getAddress(),
                    'IndEmail' => $this->accountData->getEmail(),
                ];
                break;
            case UserType::CORPORATION:
                $body['ImageCollectionTxSN'] = $this->getImageCollectionTxSn();
                $body['Corporation'] = [
                    'CorporationName' => $this->accountData->getCorporationName(),
                    'CorporationShort' => $this->accountData->getCorporationShort(),
                    'CorEmail' => $this->accountData->getEmail(),
                    'CorAddress' => $this->accountData->getAddress(),
                    'Scale' => $this->accountData->getScale(),
                    'UnifiedSocialCreditCode' => $this->accountData->getUnifiedSocialCreditCode(),
                    'AllLicenceIssDate' => $this->accountData->getAllLicenceIssDate(),
                    'AllLicenceExpiryDate' => $this->accountData->getAllLicenceExpiryDate(),
                    'LegalPersonName' => $this->accountData->getUserName(),
                    'LegalCredentialType' => $this->accountData->getCredentialType(),
                    'LegalCredentialNumber' => $this->accountData->getCredentialNumber(),
                    'LegalPersonIssDate' => $this->accountData->getIssDate(),
                    'LegalPersonExpiryDate' => $this->accountData->getExpiryDate(),
                    'LegalPersonContactNumber' => $this->accountData->getContactNumber(),
                ];
                if ($this->accountData->getProvince()) {
                    $body['Corporation']['Province'] = $this->accountData->getProvince();
                    $body['Corporation']['City'] = $this->accountData->getCity();
                    $body['Corporation']['District'] = $this->accountData->getDistrict();
                }
                if ($this->accountData->getBasicAcctNo()) {
                    $body['Corporation']['BasicAcctNo'] = $this->accountData->getBasicAcctNo();
                }
                if ($this->accountData->getApprovalNo()) {
                    $body['Corporation']['ApprovalNo'] = $this->accountData->getApprovalNo();
                }
                if ($this->accountData->getConsigneeName()) {
                    $body['Corporation']['ConsigneeName'] = $this->accountData->getConsigneeName();
                    $body['Corporation']['ConsigneeCredentialType'] = $this->accountData->getConsigneeCredentialType();
                    $body['Corporation']['ConsigneeCredentialNumber'] = $this->accountData->getConsigneeCredentialNumber();
                    $body['Corporation']['ConsigneeIssDate'] = $this->accountData->getConsigneeIssDate();
                    $body['Corporation']['ConsigneeExpiryDate'] = $this->accountData->getConsigneeExpiryDate();
                    $body['Corporation']['ConsigneeContactNumber'] = $this->accountData->getConsigneeContactNumber();
                }
                break;
            case UserType::RETAILER:
                $body['Retailer'] = [
                    'RetailerRegNumber' => $this->accountData->getUnifiedSocialCreditCode(),
                    'RetailerName' => $this->accountData->getCorporationName(),
                    'RetailerLicenseIssDate' => $this->accountData->getAllLicenceIssDate(),
                    'RetailerLicenseExpiryDate' => $this->accountData->getAllLicenceExpiryDate(),
                    'RetailerAddress' => $this->accountData->getAddress(),
                    'ManagerNam' => $this->accountData->getUserName(),
                    'ManagerCredentialType' => $this->accountData->getCredentialType(),
                    'ManagerCredentialNumber' => $this->accountData->getCredentialNumber(),
                    'ManagerIssDate' => $this->accountData->getIssDate(),
                    'ManagerExpiryDate' => $this->accountData->getExpiryDate(),
                    'ManagerContactNumber' => $this->accountData->getContactNumber(),
                    'ManagerEmail' => $this->accountData->getEmail(),
                ];
                if ($this->accountData->getProvince()) {
                    $body['Retailer']['RetailerProvince'] = $this->accountData->getProvince();
                    $body['Retailer']['RetailerCity'] = $this->accountData->getCity();
                    $body['Retailer']['RetailerDistrict'] = $this->accountData->getDistrict();
                }
                break;
        }
        if ($this->businessType == 20 || $this->businessType = 21) {
            $body['BankAccount'] = [
                'BindingTxSN' => $this->bankAccount->getBindingTxSn(),
                'BankID' => $this->bankAccount->getBankId(),
                'BankAccountNumber' => $this->bankAccount->getBankAccountNumber(),
            ];
            if ($this->userType == UserType::CORPORATION) {
                $body['BankAccount']['BranchName'] = $this->bankAccount->getBranchName();
                $body['BankAccount']['BankProvince'] = $this->bankAccount->getProvince();
                $body['BankAccount']['BankCity'] = $this->bankAccount->getCity();
            } else {
                $body['BankAccount']['BankPhoneNumber'] = $this->bankAccount->getBankPhoneNumber();
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
    public function getUserType(): int
    {
        return $this->userType;
    }

    /**
     * @param int $userType
     */
    public function setUserType(int $userType): void
    {
        $this->userType = $userType;
    }

    /**
     * @return int
     */
    public function getBusinessType(): int
    {
        return $this->businessType;
    }

    /**
     * @param int $businessType
     */
    public function setBusinessType(int $businessType): void
    {
        $this->businessType = $businessType;
    }

    /**
     * @return string
     */
    public function getNoticeUrl(): ?string
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

    /**
     * @return string
     */
    public function getImageCollectionTxSn(): ?string
    {
        return $this->imageCollectionTxSn;
    }

    /**
     * @param string $imageCollectionTxSn
     */
    public function setImageCollectionTxSn(string $imageCollectionTxSn): void
    {
        $this->imageCollectionTxSn = $imageCollectionTxSn;
    }
}