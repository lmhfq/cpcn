<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/21
 * Time: 上午10:58
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class Tx5036Request extends BaseRequest
{
    protected $txCode = '5036';
    /**
     * @var string
     */
    protected $sourceTxCode;
    /**
     * @var string
     */
    protected $sourceTxTime;

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
     * @return string
     */
    public function getSourceTxTime(): string
    {
        return $this->sourceTxTime ?: '';
    }

    /**
     * @param string $sourceTxTime
     */
    public function setSourceTxTime(string $sourceTxTime): void
    {
        $this->sourceTxTime = $sourceTxTime;
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
            'SourceTxCode' => $this->getSourceTxCode(),
            'SourceTxTime' => $this->getSourceTxTime(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}