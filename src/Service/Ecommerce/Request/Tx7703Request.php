<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午4:40
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

use Lmh\Cpcn\Constant\ProtocolSigner;
use Lmh\Cpcn\Support\Xml;

class Tx7703Request extends BaseRequest
{
    protected $txCode = '7703';
    /**
     * @var string 申请流水号
     */
    protected $applyNo;
    /**
     * @var string 协议模板编号
     */
    protected $protocolNumber;
    /**
     * @var int 协议签署人类型
     * 10-企业法人（企业）
     * 20-经办人（企业）
     * 30-个体工商户自身（个体）
     */
    protected $protocolSignerType = 10;
    /**
     * @var string 经办人手机号
     * ProtocolSignerType=20 时必填
     */
    protected $agentPhoneNumber;
    /**
     * @var string 经办人姓名
     * ProtocolSignerType=20 时必填
     */
    protected $agentName;
    /**
     * @var string 经办人身份证号
     * ProtocolSignerType=20 时必填
     */
    protected $agentIdNumber;

    /**
     * @var string 协议签署人手机号
     */
    protected $protocolSignPhoneNumber;
    /**
     * @var int 立即签约
     * 10-是
     * 20-否
     */
    protected $immediatelySign = 10;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl = '';
    /**
     * @var int 操作类型
     * （10-签约，20-绑卡并签约）
     */
    protected $operationType = 10;
    /**
     * @var string 银行账户绑定流水号
     */
    protected $bindingTxSN;
    /**
     * @var string 绑定银行 ID
     * OperationType=20 时，必填
     */
    protected $bankId;
    /**
     * @var string 账户名称
     * OperationType=20 时，必填
     */
    protected $bankAccountName;
    /**
     * @var string 账户号码
     * OperationType=20 时必填
     */
    protected $bankAccountNumber;
    /**
     * @var string 银行卡预留手机号码
     * 个人用户开户绑卡时，不填默认为开户手机号码
     */
    protected $bankPhoneNumber;
    /**
     * @var string 分支行名称
     * OperationType=20 和企业时必填
     */
    protected $branchName;
    /**
     * @var string 省份
     * OperationType=20 时必填
     */
    protected $province;
    /**
     * @var string 城市
     * OperationType=20 时必填
     */
    protected $city;

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
    public function getProtocolNumber(): string
    {
        return $this->protocolNumber;
    }

    /**
     * @param string $protocolNumber
     */
    public function setProtocolNumber(string $protocolNumber): void
    {
        $this->protocolNumber = $protocolNumber;
    }

    /**
     * @return int
     */
    public function getProtocolSignerType(): int
    {
        return $this->protocolSignerType;
    }

    /**
     * @param int $protocolSignerType
     */
    public function setProtocolSignerType(int $protocolSignerType): void
    {
        $this->protocolSignerType = $protocolSignerType;
    }

    /**
     * @return string
     */
    public function getAgentPhoneNumber(): string
    {
        return $this->agentPhoneNumber;
    }

    /**
     * @param string $agentPhoneNumber
     */
    public function setAgentPhoneNumber(string $agentPhoneNumber): void
    {
        $this->agentPhoneNumber = $agentPhoneNumber;
    }

    /**
     * @return string
     */
    public function getAgentName(): string
    {
        return $this->agentName;
    }

    /**
     * @param string $agentName
     */
    public function setAgentName(string $agentName): void
    {
        $this->agentName = $agentName;
    }

    /**
     * @return string
     */
    public function getAgentIdNumber(): string
    {
        return $this->agentIdNumber;
    }

    /**
     * @param string $agentIdNumber
     */
    public function setAgentIdNumber(string $agentIdNumber): void
    {
        $this->agentIdNumber = $agentIdNumber;
    }

    /**
     * @return string
     */
    public function getProtocolSignPhoneNumber(): string
    {
        return $this->protocolSignPhoneNumber ?: '';
    }

    /**
     * @param string $protocolSignPhoneNumber
     */
    public function setProtocolSignPhoneNumber(string $protocolSignPhoneNumber): void
    {
        $this->protocolSignPhoneNumber = $protocolSignPhoneNumber;
    }

    /**
     * @return int
     */
    public function getImmediatelySign(): int
    {
        return $this->immediatelySign;
    }

    /**
     * @param int $immediatelySign
     */
    public function setImmediatelySign(int $immediatelySign): void
    {
        $this->immediatelySign = $immediatelySign;
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

    /**
     * @return int
     */
    public function getOperationType(): int
    {
        return $this->operationType;
    }

    /**
     * @param int $operationType
     */
    public function setOperationType(int $operationType): void
    {
        $this->operationType = $operationType;
    }

    /**
     * @return string
     */
    public function getBindingTxSN(): string
    {
        return $this->bindingTxSN;
    }

    /**
     * @param string $bindingTxSN
     */
    public function setBindingTxSN(string $bindingTxSN): void
    {
        $this->bindingTxSN = $bindingTxSN;
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

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ApplyNo' => $this->getApplyNo(),
            'UserID' => $this->getUserId(),
            'ProtocolNumber' => $this->getProtocolNumber(),
            'ProtocolSignerType' => $this->getProtocolSignerType(),
            'NoticeURL' => $this->getNoticeUrl(),
        ];
        if ($this->protocolSignerType == ProtocolSigner::TYPE_AGENT) {
            $body['AgentPhoneNumber'] = $this->getAgentPhoneNumber();
            $body['AgentName'] = $this->getAgentName();
            $body['AgentIDNumber'] = $this->getAgentIdNumber();
        }
        $body['ProtocolSignPhoneNumber'] = $this->getProtocolSignPhoneNumber();
        $body['ImmediatelySign'] = $this->getImmediatelySign();
        $body['OperationType'] = $this->getOperationType();
        if ($this->operationType == 20) {
            $body['BindingTxSN'] = $this->getBindingTxSN();
            $body['BankID'] = $this->getBankId();
            $body['BankAccountName'] = $this->getBankAccountName();
            $body['BankAccountNumber'] = $this->getBankAccountNumber();
            $body['BranchName'] = $this->getBranchName();
            $body['Province'] = $this->getProvince();
            $body['City'] = $this->getCity();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
    }
}