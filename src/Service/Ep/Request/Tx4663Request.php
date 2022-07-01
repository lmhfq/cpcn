<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Constant\Operation;
use Lmh\Cpcn\Support\Xml;

class Tx4663Request extends BaseRequest
{
    protected $txCode = '4663';
    /**
     * @var int 操作类型：
     * 10=冻结
     * 20=解冻
     * 30=解冻-分账并冻结
     */
    protected $operationType;
    /**
     * @var string 原冻结流水号&冻结业务的交易流水号
     * 操作类型：20=解冻时 必填；
     * 操作类型：30=解冻-分账并冻结时，为分账流水号，必填
     */
    protected $freezeTxSn;
    /**
     * @var string 原支付订单号
     */
    protected $sourceTxSn;
    /**
     * @var int 交易金额
     * 单位：分
     */
    protected $amount;
    /**
     * @var string 备注
     * 单位：分
     */
    protected $remark;

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'UserID' => $this->getUserId(),
            'TxSN' => $this->getTxSn(),
            'OperationType' => $this->getOperationType(),
            'Amount' => $this->getAmount(),
            'Remark' => $this->getRemark(),
        ];
        if ($this->operationType == Operation::TYPE_THAWING) {
            $body['FreezeTxSN'] = $this->getFreezeTxSn();
        } else if ($this->operationType == Operation::TYPE_SHARE_FREEZE) {
            $body['FreezeTxSN'] = $this->getFreezeTxSn();
            $body['SourceTxSN'] = $this->getSourceTxSn();
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
    public function getRemark(): string
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
    public function getFreezeTxSn(): string
    {
        return $this->freezeTxSn;
    }

    /**
     * @param string $freezeTxSn
     */
    public function setFreezeTxSn(string $freezeTxSn): void
    {
        $this->freezeTxSn = $freezeTxSn;
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
}