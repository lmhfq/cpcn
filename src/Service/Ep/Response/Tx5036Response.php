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
    protected $status;
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
     * @return int
     */
    public function getAvailableCancelAmount(): int
    {
        return $this->availableCancelAmount;
    }

    /**
     * @param int $availableCancelAmount
     */
    public function setAvailableCancelAmount(int $availableCancelAmount): void
    {
        $this->availableCancelAmount = $availableCancelAmount;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
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
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->availableSplitAmount = intval(ArrayUtil::get('AvailableSplitAmount', $this->responseBody));
            $this->availableCancelAmount = intval(ArrayUtil::get('AvailableCancelAmount', $this->responseBody));
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