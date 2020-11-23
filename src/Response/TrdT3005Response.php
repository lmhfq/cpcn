<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\PayResultEntity;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT3005Response extends TrdBaseResponse
{
    /**
     * @var array
     */
    protected $payRsutList = [];

    /**
     * @return array
     */
    public function getPayRsutList(): array
    {
        return $this->payRsutList;
    }

    /**
     * @param array $payRsutList
     */
    public function setPayRsutList(array $payRsutList): void
    {
        $this->payRsutList = $payRsutList;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $billInfo = ArrayUtil::get('billInfo', $this->responseData, []);
            if ($billInfo) {
                return;
            }
            foreach ($billInfo as $item) {
                $payResultEntity = new PayResultEntity();
                $payResultEntity->setOrderNo(ArrayUtil::get('OrderNo', $item));
                $payResultEntity->setBillno(ArrayUtil::get('BillNo', $item));
                $payResultEntity->setPlatsrl(ArrayUtil::get('PlatSrl', $item));
                $payResultEntity->setBillstate(ArrayUtil::get('BillState', $item));
                $payResultEntity->setOpion(ArrayUtil::get('Opion', $item));
                $this->payRsutList[] = $payResultEntity;
            }
        }
    }
}