<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Entity\Tx\SplitItemsEntity;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx5036Response extends BaseResponse
{
    /**
     * @var int 支付总金额，单位：分
     */
    protected $amount;
    /**
     * @var int 可用分账金额，单位：分
     */
    protected $availableSplitAmount;
    /**
     * @var int 可用撤销金额，单 位：分
     * 可撤销金额为支付金 额进去已分账金额
     */
    protected $availableCancelAmount;
    /**
     * @var array
     */
    protected $splitItems;
    /**
     * @var int
     */
    protected $sumPayeeFee;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getAvailableSplitAmount(): int
    {
        return $this->availableSplitAmount;
    }

    /**
     * @return array
     */
    public function getSplitItems(): array
    {
        return $this->splitItems;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->amount = intval(ArrayUtil::get('Amount', $this->responseBody));
            $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->responseBody));
            $splitItems = ArrayUtil::get('SplitItems', $this->responseBody, []);
            if ($splitItems) {
                if (!isset($splitItems[0])) {
                    $splitItems = [$splitItems];
                }
                foreach ($splitItems as $v) {
                    $splitItemsEntity = new SplitItemsEntity();
                    $splitItemsEntity->setSplitTxSn($v['SplitTxSN'] ?? '');
                    $splitItemsEntity->setSpLitUserId($v['SplitUserID'] ?? '');
                    $splitItemsEntity->setSplitAmount(intval($v['SplitAmount'] ?? 0));
                    $splitItemsEntity->setSplitResponseTime($v['ResponseTime'] ?? '');
                    $splitItemsEntity->setSplitStatus(intval($v['SplitStatus'] ?? 0));
                    $splitItemsEntity->setSplitFee(intval($v['SplitFee'] ?? 0));
                    $splitItemsEntity->setSplitPayFee(intval($v['SplitPayFee'] ?? 0));
                    $this->splitItems[] = $splitItemsEntity;
                }
            }
        }
    }
}