<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\ResponseBillInfoT3005Entity;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT3005Response extends TrdBaseResponse
{
    /**
     * @var array
     */
    protected $billInfo = [];

    /**
     * @return array
     */
    public function getBillInfo(): array
    {
        return $this->billInfo;
    }

    /**
     * @param array $billInfo
     */
    public function setBillInfo(array $billInfo): void
    {
        $this->billInfo = $billInfo;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $billInfo = ArrayUtil::get('billInfo', $this->responseData, []);
            if (!isset($billInfo[0])) {
                $billInfo = [$billInfo];
            }
            foreach ($billInfo as $item) {
                $payResultEntity = new ResponseBillInfoT3005Entity();
                $payResultEntity->setOrderNo(ArrayUtil::get('OrderNo', $item));
                $payResultEntity->setBillno(ArrayUtil::get('BillNo', $item));
                $payResultEntity->setPlatsrl(ArrayUtil::get('PlatSrl', $item));
                $payResultEntity->setBillstate(ArrayUtil::get('BillState', $item));
                $payResultEntity->setOpion(ArrayUtil::get('Opion', $item));
                $this->billInfo[] = $payResultEntity;
            }
        }
    }
}