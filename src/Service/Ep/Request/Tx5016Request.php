<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx5016Request extends BaseRequest
{
    protected $txCode = '5016';
    /**
     * @var string 原支付交易时间，
     * 格式：yyyyMMdd；
     * 不上送只支持一年之内的支付交易查询
     */
    protected $sourceTxTime;

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
        ];
        if ($this->sourceTxTime) {
            $body['SourceTxTime'] = $this->getSourceTxTime();
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
    public function getSourceTxTime(): string
    {
        return $this->sourceTxTime;
    }

    /**
     * @param string $sourceTxTime
     */
    public function setSourceTxTime(string $sourceTxTime): void
    {
        $this->sourceTxTime = $sourceTxTime;
    }
}