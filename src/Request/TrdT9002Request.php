<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9002Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9002";

    public $quydt;

    public $quystdt;

    public $quyenddt;

    public $quydtpe;

    public $subno;

    public $tye;

    public $dtrcd;

    public $paytype;

    public $secpaytype;

    public $merchantid;

    public $pagsiz;

    public $curpag;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'QuyDt' => $this->quydt,
            'QuyStDt' => $this->quystdt,
            'QuyEndDt' => $this->quyenddt,
            'QuyDtPe' => $this->quydtpe,
            'SubNo' => $this->subno,
            'tye' => $this->tye,
            'DTrCd' => $this->dtrcd,
            'PayType' => $this->paytype,
            'SecPayType' => $this->secpaytype,
            'MerchantId' => $this->merchantid,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}