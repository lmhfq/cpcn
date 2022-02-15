<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/15
 * Time: 上午9:50
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4656Request extends BaseRequest
{
    protected $txCode = '4656';
    /**
     * @var string 原交易流水号
     */
    protected $sourceTxSn;
    /**
     * @var string 原业务交易编码：
     * 4641=充值
     * 4643=提现
     * 4645=代付
     * 4651=转账充值
     */
    protected $sourceTxCode;

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

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'SourceTxSN' => $this->getSourceTxSn(),
            'SourceTxCode' => $this->getSourceTxCode(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}