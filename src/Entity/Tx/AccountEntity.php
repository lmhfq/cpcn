<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 上午9:56
 */

namespace Lmh\Cpcn\Entity\Tx;


class AccountEntity
{
    /**
     * @var string 企业名称
     */
    protected $corporationName;
    /**
     * @var string 客户简称
     */
    protected $corporationShort;
    /**
     * @var string 企业邮箱
     */
    protected $email;
    /**
     * @var string 企业地址
     */
    protected $address;
    /**
     * @var string 省份、城市、区县
     */
    protected $province;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string
     */
    protected $district;
    /**
     * @var string 企业规模：
     * 01=大型
     * 02=中型
     * 03=小型
     * 04=微型
     * 98=其他
     */
    protected $scale = '03';
    /**
     * @var string 企业银行账户
     * 众邦银行必填
     */
    protected $basicAcctNo;
    /**
     * @var string 基础存款账户编号
     * 众邦银行必填
     */
    protected $approvalNo;
    /**
     * @var string 统一社会信用代码
     */
    protected $unifiedSocialCreditCode;
    /**
     * @var string 营业执照有效期（起始）
     */
    protected $allLicenceIssDate;
    /**
     * @var string 营业执照有效期（到期）
     * 格式：yyyyMMdd；证件长期有效时为 99991231
     */
    protected $allLicenceExpiryDate;
    /**
     * @var string 法人姓名|用户姓名
     */
    protected $userName;
    /**
     * @var int 法人证件类型：
     * 0-身份证
     * 2-外国护照
     * 5-港澳居民来往内地通行证
     * 6-台湾居民来往大陆通行证
     */
    protected $credentialType = 0;
    /**
     * @var string 证件号码
     */
    protected $credentialNumber;
    /**
     * @var string 身份证件有效期（起始）
     */
    protected $issDate;
    /**
     * @var string 身份证件有效期（到期）
     */
    protected $expiryDate;
    /**
     * @var string 联系电话|开户手机号
     */
    protected $contactNumber;
    /**
     * @var string 经办人姓名
     * 如果上送，经办人信息必须全部上送；
     */
    protected $consigneeName;
    /**
     * @var string 经办人证件类型：0-身份证
     */
    protected $consigneeCredentialType = 0;
    /**
     * @var string 经办人证件号码
     */
    protected $consigneeCredentialNumber;
    /**
     * @var string 经办人身份证件有效期（起始）
     */
    protected $consigneeIssDate;
    /**
     * @var string 经办人身份证件有效期（到期）
     */
    protected $consigneeExpiryDate;
    /**
     * @var string 经办人联系电话
     */
    protected $consigneeContactNumber;

    /**
     * @return string
     */
    public function getCorporationName(): string
    {
        return $this->corporationName ?: '';
    }

    /**
     * @param string $corporationName
     */
    public function setCorporationName(string $corporationName): void
    {
        $this->corporationName = $corporationName;
    }

    /**
     * @return string
     */
    public function getCorporationShort(): string
    {
        return $this->corporationShort ?: '';
    }

    /**
     * @param string $corporationShort
     */
    public function setCorporationShort(string $corporationShort): void
    {
        $this->corporationShort = $corporationShort;
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
     * @author lmh
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

    /**
     * @return string
     * @author lmh
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict(string $district): void
    {
        $this->district = $district ?: '';
    }

    /**
     * @return string
     */
    public function getScale(): string
    {
        return $this->scale;
    }

    /**
     * @param string $scale
     */
    public function setScale(string $scale): void
    {
        $this->scale = $scale;
    }

    /**
     * @return string
     */
    public function getBasicAcctNo(): string
    {
        return $this->basicAcctNo ?: '';
    }

    /**
     * @param string $basicAcctNo
     */
    public function setBasicAcctNo(string $basicAcctNo): void
    {
        $this->basicAcctNo = $basicAcctNo;
    }

    /**
     * @return string
     */
    public function getApprovalNo(): string
    {
        return $this->approvalNo ?: '';
    }

    /**
     * @param string $approvalNo
     */
    public function setApprovalNo(string $approvalNo): void
    {
        $this->approvalNo = $approvalNo;
    }

    /**
     * @return string
     */
    public function getUnifiedSocialCreditCode(): string
    {
        return $this->unifiedSocialCreditCode ?: '';
    }

    /**
     * @param string $unifiedSocialCreditCode
     */
    public function setUnifiedSocialCreditCode(string $unifiedSocialCreditCode): void
    {
        $this->unifiedSocialCreditCode = $unifiedSocialCreditCode;
    }

    /**
     * @return string
     */
    public function getAllLicenceIssDate(): string
    {
        return $this->allLicenceIssDate ?: '';
    }

    /**
     * @param string $allLicenceIssDate
     */
    public function setAllLicenceIssDate(string $allLicenceIssDate): void
    {
        $this->allLicenceIssDate = $allLicenceIssDate;
    }

    /**
     * @return string
     */
    public function getAllLicenceExpiryDate(): string
    {
        return $this->allLicenceExpiryDate;
    }

    /**
     * @param string $allLicenceExpiryDate
     */
    public function setAllLicenceExpiryDate(string $allLicenceExpiryDate): void
    {
        $this->allLicenceExpiryDate = $allLicenceExpiryDate;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName ?: '';
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
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
        return $this->credentialNumber ?: '';
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
    public function getIssDate(): string
    {
        return $this->issDate ?: '';
    }

    /**
     * @param string $issDate
     */
    public function setIssDate(string $issDate): void
    {
        $this->issDate = $issDate;
    }

    /**
     * @return string
     */
    public function getExpiryDate(): string
    {
        return $this->expiryDate ?: '';
    }

    /**
     * @param string $expiryDate
     */
    public function setExpiryDate(string $expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return string
     */
    public function getContactNumber(): string
    {
        return $this->contactNumber ?: '';
    }

    /**
     * @param string $contactNumber
     */
    public function setContactNumber(string $contactNumber): void
    {
        $this->contactNumber = $contactNumber;
    }

    /**
     * @return string
     */
    public function getConsigneeName(): string
    {
        return $this->consigneeName ?: '';
    }

    /**
     * @param string $consigneeName
     */
    public function setConsigneeName(string $consigneeName): void
    {
        $this->consigneeName = $consigneeName;
    }

    /**
     * @return string
     */
    public function getConsigneeCredentialType()
    {
        return $this->consigneeCredentialType;
    }

    /**
     * @param string $consigneeCredentialType
     */
    public function setConsigneeCredentialType($consigneeCredentialType): void
    {
        $this->consigneeCredentialType = $consigneeCredentialType;
    }

    /**
     * @return string
     */
    public function getConsigneeCredentialNumber(): string
    {
        return $this->consigneeCredentialNumber;
    }

    /**
     * @param string $consigneeCredentialNumber
     */
    public function setConsigneeCredentialNumber(string $consigneeCredentialNumber): void
    {
        $this->consigneeCredentialNumber = $consigneeCredentialNumber;
    }

    /**
     * @return string
     */
    public function getConsigneeIssDate(): string
    {
        return $this->consigneeIssDate;
    }

    /**
     * @param string $consigneeIssDate
     */
    public function setConsigneeIssDate(string $consigneeIssDate): void
    {
        $this->consigneeIssDate = $consigneeIssDate;
    }

    /**
     * @return string
     */
    public function getConsigneeExpiryDate(): string
    {
        return $this->consigneeExpiryDate;
    }

    /**
     * @param string $consigneeExpiryDate
     */
    public function setConsigneeExpiryDate(string $consigneeExpiryDate): void
    {
        $this->consigneeExpiryDate = $consigneeExpiryDate;
    }

    /**
     * @return string
     */
    public function getConsigneeContactNumber(): string
    {
        return $this->consigneeContactNumber;
    }

    /**
     * @param string $consigneeContactNumber
     */
    public function setConsigneeContactNumber(string $consigneeContactNumber): void
    {
        $this->consigneeContactNumber = $consigneeContactNumber;
    }
}