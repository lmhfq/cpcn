<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Entity\PayInfoEntity;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3005Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3005";
    /**
     * @var array[PayInfoEntity]
     */
    protected $payInfoList = [];

    /**
     * @return array
     */
    public function getPayInfoList(): array
    {
        return $this->payInfoList;
    }

    /**
     * @param array $payInfoList
     */
    public function setPayInfoList(array $payInfoList): void
    {
        $this->payInfoList = $payInfoList;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());

        $billInfo = [];
        foreach ($this->payInfoList as $item) {
            /**
             * @var PayInfoEntity $item
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