<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT4001Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T4001";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $qpy_bkid;

    public $qpy_accno;

    public $qpy_accnm;

    public $qpy_cdtp;

    public $qpy_cdno;

    public $qpy_mobno;

    public $qpy_acctp;

    public $fcflg;

    public $smsflg;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, parent::getSrl());
        $data = array_merge($data, [
            'CltAcc' => [
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'Qpy' => [
                'BkId' => $this->qpy_bkid,
                'AccNo' => $this->qpy_accno,
                'AccNm' => $this->qpy_accnm,
                'CdTp' => $this->qpy_cdtp,
                'CdNo' => $this->qpy_cdno,
                'MobNo' => $this->qpy_mobno,
                'AccTp' => $this->qpy_acctp,
            ],
            'FcFlg' => $this->fcflg,
            'SMSFlg' => $this->smsflg,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}