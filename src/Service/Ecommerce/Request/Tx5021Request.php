<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:40
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

use Lmh\Cpcn\Support\Xml;

class Tx5021Request extends BaseRequest
{
    protected $txCode = '5021';
    /**
     * @var string 原支付交易流水号，
     * 上传 5011 的 TxSn 或 5012 接口的 TxSn
     */
    protected $paymentTxSn;
    /**
     * @var string 原支付交易时间，
     * 格式：yyyyMMdd；
     */
    protected $sourceTxTime;
    /**
     * @var int 退款方式:
     * 10=退款到用户账户
     * 20=原路退款
     */
    protected $refundWay = 20;
    /**
     * @var int 退款金额
     */
    protected $amount;
    /**
     * @var int 撤销金额
     */
    protected $cancelAmount;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl;
    /**
     * @var string 备注
     */
    protected $remark;
    /**
     * @var array 分账退款结算域
     */
    protected $splitItems;

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
    }
}