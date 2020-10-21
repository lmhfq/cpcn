<?php
declare(strict_types=1);


namespace Cpcn\Request;


use Cpcn\Exception\InvalidConfigException;
use Cpcn\Support\Xml;

class TrdT3061Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3061";

    public $cltacc_subno;

    public $cltacc_cltnm;

    public $amt_aclamt;

    public $amt_ccycd;

    public $billinfo_rsubno;

    public $billinfo_rcltnm;

    public $billinfo_billno;

    public $billinfo_orderno;

    public $billinfo_billamt;

    public $billinfo_aclamt;

    public $billinfo_payfee;

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

    public $billinfo_goodsmess;

    public $billinfo_appid;

    public $reqflg;

    public $merchantid;

    public $notificationurl;

    public $usage;

    public $trsflag;

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());
        $data = array_merge($data, [
            'CltAcc' => [
                'SubNo' => $this->cltacc_subno,
                'CltNm' => $this->cltacc_cltnm,
            ],
            'Amt' => [
                'AclAmt' => $this->amt_aclamt,
                'CcyCd' => $this->amt_ccycd,
            ],
            'billInfo' => [
                'RSubNo' => $this->billinfo_rsubno,
                'RCltNm' => $this->billinfo_rcltnm,
                'BillNo' => $this->billinfo_billno,
                'OrderNo' => $this->billinfo_orderno,
                'BillAmt' => $this->billinfo_billamt,
                'AclAmt' => $this->billinfo_aclamt,
                'PayFee' => $this->billinfo_payfee,
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
                'GoodsMess' => $this->billinfo_goodsmess,
                'AppID' => $this->billinfo_appid,
            ],
            'ReqFlg' => $this->reqflg,
            'MerchantId' => $this->merchantid,
            'NotificationURL' => $this->notificationurl,
            'Usage' => $this->usage,
            'TrsFlag' => $this->trsflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}