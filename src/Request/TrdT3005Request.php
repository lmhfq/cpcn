<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Entity\RequestBillInfoT3005Entity;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3005";
    /**
     * @var array[PayInfoEntity]
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

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());

        $billInfo = [];
        foreach ($this->billInfo as $item) {
            /**
             * @var RequestBillInfoT3005Entity $item
             */
            $billInfo[] = [
                'PSubNo' => $item->getBillinfoPsubno(),
                'PNm' => $item->getBillinfoPnm(),
                'RSubNo' => $item->getBillinfoRsubno(),
                'RCltNm' => $item->getBillinfoRcltnm(),
                'BillNo' => $item->getBillinfoBillno(),
                'AclAmt' => $item->getBillinfoAclamt(),
                'PayFee' => $item->getBillinfoPayfee(),
                'PayeeFee' => $item->getBillinfoPayfee(),
                'CcyCd' => $item->getBillinfoCcycd(),
                'Usage' => $item->getBillinfoUsage(),
                'TrsFlag' => $item->getBillinfoTrsflag(),
            ];
        }
        $data = array_merge($data, $billInfo);
        $xml = Xml::build($data, "MSG", 'billInfo');
        parent::process($xml);
    }
}