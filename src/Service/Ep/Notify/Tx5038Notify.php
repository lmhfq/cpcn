<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/22
 * Time: 上午11:09
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Entity\Tx\SplitItemsEntity;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5038Notify extends TBaseNotify
{

    /**
     * @var string 原支付交易流水号
     */
    protected $paymentTxSn;
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var int
     */
    protected $availableSplitAmount;
    /**
     * @var int 分账状态:
     * 10=处理中
     * 20=成功
     * 30=失败
     */
    protected $status;
    /**
     * @var int 收款用户手续费
     * 总金额，单位：分
     */
    protected $sumPayeeFee;
    /**
     * @var string  分账成功时间
     */
    protected $responseTime;
    /**
     * @var array
     */
    protected $splitItems;

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->amount = ArrayUtil::get('Amount', $this->noticeBody);
        $this->availableSplitAmount = ArrayUtil::get('AvailableSplitAmount', $this->noticeBody);
        $this->paymentTxSn = ArrayUtil::get('PaymentTxSN', $this->noticeBody);
        $splitItems = ArrayUtil::get('SplitItems', $this->noticeBody, []);
        if (!isset($splitItems[0])) {
            $splitItems = [$splitItems];
        }
        foreach ($splitItems as $v) {
            $splitItemsEntity = new SplitItemsEntity();
            $splitItemsEntity->setSplitTxSn($v['SplitTxSN'] ?? '');
            $splitItemsEntity->setSplitAmount(intval($v['SplitAmount'] ?? 0));
            $splitItemsEntity->setSplitResponseTime($v['SplitResponseTime']);
            $splitItemsEntity->setSplitStatus(intval($v['SplitStatus']) ?? 0);
            $splitItemsEntity->setSplitFee(intval($v['SplitFee']) ?? 0);
            $this->splitItems[] = $splitItemsEntity;
        }
    }
}