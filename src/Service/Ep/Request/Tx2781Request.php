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
    protected $lrIdCardFrontMediaID;
    /**
     * @var string 法人身份证反面照片 MediaID
     */
    protected $lrIdCardBackMediaIDD;
    /**
     * @var string 证书照片 MediaID 若主体类型为企业或者个体户请上送“营业执照照片”
     */
    protected $certificateMediaID;

    /**
     * @return string
     */
    public function getLrIdCardFrontMediaID(): string
    {
        return $this->lrIdCardFrontMediaID;
    }

    /**
     * @param string $lrIdCardFrontMediaID
     */
    public function setLrIdCardFrontMediaID(string $lrIdCardFrontMediaID): void
    {
        $this->lrIdCardFrontMediaID = $lrIdCardFrontMediaID;
    }

    /**
     * @return string
     */
    public function getLrIdCardBackMediaIDD(): string
    {
        return $this->lrIdCardBackMediaIDD;
    }

    /**
     * @param string $lrIdCardBackMediaIDD
     */
    public function setLrIdCardBackMediaIDD(string $lrIdCardBackMediaIDD): void
    {
        $this->lrIdCardBackMediaIDD = $lrIdCardBackMediaIDD;
    }

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ApplyNo' => $this->getApplyNo(),
            'UserID' => $this->getUserId(),
            'ContactName' => $this->getContactName(),
            'ContactPhone' => $this->getContactPhone(),
            'ContactIdNumber' => $this->getContactIdNumber(),
            'AuthEntityType' => $this->getAuthEntityType(),
        ];
        if ($this->getCertificationType()) {
            $body['CertificateMediaID'] = $this->getCertificateMediaID();
        }
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
    public function getCertificateMediaID(): string
    {
        return $this->certificateMediaID;
    }

    /**
     * @param string $certificateMediaID
     */
    public function setCertificateMediaID(string $certificateMediaID): void
    {
        $this->certificateMediaID = $certificateMediaID;
    }

}