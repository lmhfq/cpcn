<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4698Request extends BaseRequest
{
    protected $txCode = '4698';

    /**
     * @var string 业务类型：
     * 10=充值 20=提现 30=转账 40=支付 41=分账 (含支付)42=代付 43=仅分账
     */
    protected $businessType;
    /**
     * @var string 业务交易流水号
     * 注：充值、提现、转账、支付流水号
     */
    protected $sourceTxSn;
    /**
     * @var string 分账流水号
     * BusinessType=41/43 必填
     */
    protected $sourceSplitTxSn;

    /**
     * @return string
     */
    public function getBusinessType(): string
    {
        return $this->businessType;
    }

    /**
     * @param string $businessType
     */
    public function setBusinessType(string $businessType): void
    {
        $this->businessType = $businessType;
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
    public function getSourceSplitTxSn(): ?string
    {
        return $this->sourceSplitTxSn;
    }

    /**
     * @param string $sourceSplitTxSn
     */
    public function setSourceSplitTxSn(string $sourceSplitTxSn): void
    {
        $this->sourceSplitTxSn = $sourceSplitTxSn;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'BusinessType' => $this->getBusinessType(),
            'SourceTxSN' => $this->getSourceTxSn(),
        ];
        if ($this->getBusinessType() == 41 || $this->getBusinessType() == 43) {
            $body['SourceSplitTxSN'] = $this->getSourceSplitTxSn();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}