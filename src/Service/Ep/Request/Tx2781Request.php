<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx2781Request extends BaseRequest
{
    protected $txCode = '2781';
    /**
     * @var string 申请流水号
     */
    protected $applyNo;
    /**
     * @var int 联系人类型：10-经营者/法人20-经办人
     */
    protected $contactType = 10;
    /**
     * @var string 联系人（2~30 个中文字符、英文字符、符号
     */
    protected $contactName;
    /**
     * @var string 联系电话
     */
    protected $contactPhone;
    /**
     * @var string 联系人身份证号码
     */
    protected $contactIdNumber;
    /**
     * @var string
     */
    protected $contactCertBeginDate;
    /**
     * @var string
     */
    protected $contactCertEndDate;
    /**
     * @var int 联系人证件类型：
     * 0-身份证
     * 2-外国护照
     * 5-港澳居民-来往内地通行证
     * 6-台湾居民-来往内地通行证
     */
    protected $contactCertType = 0;
    /**
     * @var string 认证主体类型
     * 01=企业
     * 02=事业单位
     * 03=个体工商户
     * 99=其他组织
     */
    protected $authEntityType;
    /**
     * @var string 证书类型： 当主体类型为事业单位或其他组织时应填写;
     * 01-事业单位法人证书
     * 02-统一社会信用代码证书
     * 03-有偿服务许可证（军队医院适用)
     * 04-医疗机构执业许可证（军队医院适用)
     * 05-企业营业执照（挂靠企业的党组织适用)
     * 06-组织机构代码证（政府机关适用)
     * 07-社会团体法人登记证书
     * 08-民办非企业单位登记证书
     */
    protected $certificationType;
    /**
     * @var string 法人身份证正面照片 MediaID
     */
    protected $lrIdCardFrontMediaId;
    /**
     * @var string 法人身份证反面照片 MediaId
     */
    protected $lrIdCardBackMediaId;
    /**
     * @var string 法人证件居住地址 企业户必须
     */
    protected $lrIdCardAddress;
    /**
     * @var string 证书照片 MediaID 若主体类型为企业或者个体户请上送“营业执照照片”
     */
    protected $certificateMediaId;

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ApplyNo' => $this->getApplyNo(),
            'UserID' => $this->getUserId(),

        ];
        //认证主体
        $entity = [
            'AuthEntityType' => $this->getAuthEntityType(),
            'CertificationType' => $this->getCertificationType(),
        ];
        if ($this->getCertificationType()) {
            $entity['CertificateMediaID'] = $this->getCertificateMediaId();
        }
        $body['Entity'] = $entity;
        //法人信息
        $legalPerson = [
            'LrIdCardFrontMediaID' => $this->getLrIdCardFrontMediaId(),
            'LrIdCardBackMediaID' => $this->getLrIdCardBackMediaId(),
            'LrIdCardAddr' => $this->getLrIdCardAddress(),
            'LrIsOwner' => 10,
        ];
        $body['LegalPerson'] = $legalPerson;
        if ($this->getCertificationType()) {
            $entity['CertificateMediaID'] = $this->getCertificateMediaId();
        }
        $body['Entity'] = $entity;
        //联系人
        $contact = [
            'ContactType' => $this->getContactType(),
            'ContactName' => $this->getContactName(),
            'ContactPhone' => $this->getContactPhone(),
            'ContactIdNumber' => $this->getContactIdNumber(),
            'ContactCertType' => $this->getContactCertType(),
            'ContactCertBeginDate' => $this->getContactCertBeginDate(),
            'ContactCertEndDate' => $this->getContactCertEndDate(),
            'ContactCertFrontMediaID' => $this->getLrIdCardFrontMediaId(),
            'ContactCertBackMediaID' => $this->getLrIdCardBackMediaId(),
        ];
        $body['Contact'] = $contact;
        //主体类型为企业时需要填写。
        //当经营者/法人不是最终受益所有人，则需提填写受益所有人信息，最多上传4个。
        //若经营者/法人是最终受益所有人之一，可在此填写其他受益所有人信息，最多上传3个。
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }

    /**
     * @return string
     */
    public function getApplyNo(): string
    {
        return $this->applyNo;
    }

    /**
     * @param string $applyNo
     */
    public function setApplyNo(string $applyNo): void
    {
        $this->applyNo = $applyNo;
    }

    /**
     * @return string
     */
    public function getAuthEntityType(): ?string
    {
        return $this->authEntityType;
    }

    /**
     * @param string $authEntityType
     */
    public function setAuthEntityType(string $authEntityType): void
    {
        $this->authEntityType = $authEntityType;
    }

    /**
     * @return string
     */
    public function getCertificationType(): ?string
    {
        return $this->certificationType;
    }

    /**
     * @param string $certificationType
     */
    public function setCertificationType(string $certificationType): void
    {
        $this->certificationType = $certificationType;
    }

    /**
     * @return string
     */
    public function getCertificateMediaId(): string
    {
        return $this->certificateMediaId;
    }

    /**
     * @param string $certificateMediaId
     */
    public function setCertificateMediaId(string $certificateMediaId): void
    {
        $this->certificateMediaId = $certificateMediaId;
    }

    /**
     * @return string
     */
    public function getLrIdCardFrontMediaId(): string
    {
        return $this->lrIdCardFrontMediaId;
    }

    /**
     * @param string $lrIdCardFrontMediaId
     */
    public function setLrIdCardFrontMediaId(string $lrIdCardFrontMediaId): void
    {
        $this->lrIdCardFrontMediaId = $lrIdCardFrontMediaId;
    }

    /**
     * @return string
     */
    public function getLrIdCardBackMediaId(): string
    {
        return $this->lrIdCardBackMediaId;
    }

    /**
     * @param string $lrIdCardBackMediaId
     */
    public function setLrIdCardBackMediaId(string $lrIdCardBackMediaId): void
    {
        $this->lrIdCardBackMediaId = $lrIdCardBackMediaId;
    }

    /**
     * @return string
     */
    public function getLrIdCardAddress(): ?string
    {
        return $this->lrIdCardAddress;
    }

    /**
     * @param string $lrIdCardAddress
     */
    public function setLrIdCardAddress(string $lrIdCardAddress): void
    {
        $this->lrIdCardAddress = $lrIdCardAddress;
    }

    /**
     * @return int
     */
    public function getContactType(): int
    {
        return $this->contactType;
    }

    /**
     * @param int $contactType
     */
    public function setContactType(int $contactType): void
    {
        $this->contactType = $contactType;
    }

    /**
     * @return string
     */
    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     */
    public function setContactName(string $contactName): void
    {
        $this->contactName = $contactName;
    }

    /**
     * @return string
     */
    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    /**
     * @param string $contactPhone
     */
    public function setContactPhone(string $contactPhone): void
    {
        $this->contactPhone = $contactPhone;
    }

    /**
     * @return string
     */
    public function getContactIdNumber(): ?string
    {
        return $this->contactIdNumber;
    }

    /**
     * @param string $contactIdNumber
     */
    public function setContactIdNumber(string $contactIdNumber): void
    {
        $this->contactIdNumber = $contactIdNumber;
    }

    /**
     * @return int
     */
    public function getContactCertType(): int
    {
        return $this->contactCertType;
    }

    /**
     * @param int $contactCertType
     */
    public function setContactCertType(int $contactCertType): void
    {
        $this->contactCertType = $contactCertType;
    }

    /**
     * @return string
     */
    public function getContactCertBeginDate(): string
    {
        return $this->contactCertBeginDate;
    }

    /**
     * @param string $contactCertBeginDate
     */
    public function setContactCertBeginDate(string $contactCertBeginDate): void
    {
        $this->contactCertBeginDate = $contactCertBeginDate;
    }

    /**
     * @return string
     */
    public function getContactCertEndDate(): string
    {
        return $this->contactCertEndDate;
    }

    /**
     * @param string $contactCertEndDate
     */
    public function setContactCertEndDate(string $contactCertEndDate): void
    {
        $this->contactCertEndDate = $contactCertEndDate;
    }


}