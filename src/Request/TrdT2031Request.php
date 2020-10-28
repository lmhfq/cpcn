<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT2031Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T2031";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $billinfo_aclamt;

    public $billinfo_payeefee;

    public $billinfo_ccycd;

    public $billinfo_paytype;

    public $billinfo_secpaytype;

    public $billinfo_bankid;

    public $billinfo_kjbndsrl;

    public $billinfo_kjsmsflg;

    public $billinfo_subject;

    public $billinfo_goodsdesc;

    public $billinfo_userid;

    public $billinfo_minitag;

    public $billinfo_appid;

    public $reqflg;

    public $merchantid;

    public $notificationurl;

    public $servnoticurl;

    public $usage;

    public $dremark1;

    public $dremark2;

    public $dremark3;

    public $dremark4;

    public $dremark5;

    public $dremark6;

    public $trsflag;

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
                'SubNo' => '$this->cltacc_subno',
                'CltNm' => '$this->cltacc_cltnm',
            ],
            'billInfo' => [
                'AclAmt' => $this->billinfo_aclamt,
                'PayeeFee' => $this->billinfo_payeefee,
                'CcyCd' => $this->billinfo_ccycd,
                'PayType' => $this->billinfo_paytype,
                'SecPayType' => $this->billinfo_secpaytype,
                'BankID' => $this->billinfo_bankid,
                'KJBndSrl' => $this->billinfo_kjbndsrl,
                'KJSMSFlg' => $this->billinfo_kjsmsflg,
                'Subject' => $this->billinfo_subject,
                'GoodsDesc' => $this->billinfo_goodsdesc,
                'UserID' => $this->billinfo_userid,
                'MiniTag' => $this->billinfo_minitag,
                'AppID' => $this->billinfo_appid,
            ],
            'ReqFlg' => $this->reqflg,
            'MerchantId' => $this->merchantid,
            'NotificationURL' => $this->notificationurl,
            'ServNoticURL' => $this->servnoticurl,
            'Usage' => $this->usage,
            'DRemark1' => $this->dremark1,
            'DRemark2' => $this->dremark2,
            'DRemark3' => $this->dremark3,
            'DRemark4' => $this->dremark4,
            'DRemark5' => $this->dremark5,
            'DRemark6' => $this->dremark6,
            'TrsFlag' => $this->trsflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}