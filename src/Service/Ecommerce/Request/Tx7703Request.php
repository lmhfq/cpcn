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
use Lmh\Cpcn\Entity\Tx\BankAccountEntity;
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
    protected $operationType = 20;
    /**
     * @var BankAccountEntity 绑定银行卡信息
     */
    protected $bankAccount;

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
            $body['BindingTxSN'] = $this->bankAccount->getBindingTxSn();
            $body['BankID'] = $this->bankAccount->getBankId();
            $body['BankAccountName'] = $this->bankAccount->getBankAccountName();
            $body['BankAccountNumber'] = $this->bankAccount->getBankAccountNumber();
            $body['BranchName'] = $this->bankAccount->getBranchName();
            $body['Province'] = $this->bankAccount->getProvince();
            $body['City'] = $this->bankAccount->getCity();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}