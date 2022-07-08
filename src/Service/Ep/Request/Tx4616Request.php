<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4616Request extends BaseRequest
{
    protected $txCode = '4616';
    /**
     * @var string
     */
    protected $sourceTxSn;
    /**
     * @var string
     */
    protected $sourceTxCode;
    /**
     * @var int
     */
    protected $operationFlag;
    /**
     * @var int 用户类型：
     * 11=个人用户
     * 12=企业用户
     * 13=个体工商
     */
    protected $userType;

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'SourceTxSN' => $this->getSourceTxSn(),
            'SourceTxCode' => $this->getSourceTxCode(),
        ];
        if ($this->operationFlag) {
            $body['OperationFlag'] = $this->getOperationFlag();
        }
        if ($this->userType) {
            $body['UserType'] = $this->getUserType();
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
    public function getSourceTxSn(): string
    {
        return $this->sourceTxSn;
    }

    /**
     * @param string $sourceTxSn
     */
    public function setSourceTxSn(string $sourceTxSn): void
    {
        $this->sourceTxSn = $sourceTxSn;
    }

    /**
     * @return string
     */
    public function getSourceTxCode(): string
    {
        return $this->sourceTxCode;
    }

    /**
     * @param string $sourceTxCode
     */
    public function setSourceTxCode(string $sourceTxCode): void
    {
        $this->sourceTxCode = $sourceTxCode;
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
}