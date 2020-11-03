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
     * @return mixed
     */
    public function getCltaccSubno()
    {
        return $this->cltacc_subno;
    }

    /**
     * @param mixed $cltacc_subno
     */
    public function setCltaccSubno($cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @return mixed
     */
    public function getCltaccCltnm()
    {
        return $this->cltacc_cltnm;
    }

    /**
     * @param mixed $cltacc_cltnm
     */
    public function setCltaccCltnm($cltacc_cltnm): void
    {
        $this->cltacc_cltnm = $cltacc_cltnm;
    }

    /**
     * @return mixed
     */
    public function getBillinfoAclamt()
    {
        return $this->billinfo_aclamt;
    }

    /**
     * @param mixed $billinfo_aclamt
     */
    public function setBillinfoAclamt($billinfo_aclamt): void
    {
        $this->billinfo_aclamt = $billinfo_aclamt;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPayeefee()
    {
        return $this->billinfo_payeefee;
    }

    /**
     * @param mixed $billinfo_payeefee
     */
    public function setBillinfoPayeefee($billinfo_payeefee): void
    {
        $this->billinfo_payeefee = $billinfo_payeefee;
    }

    /**
     * @return mixed
     */
    public function getBillinfoCcycd()
    {
        return $this->billinfo_ccycd;
    }

    /**
     * @param mixed $billinfo_ccycd
     */
    public function setBillinfoCcycd($billinfo_ccycd): void
    {
        $this->billinfo_ccycd = $billinfo_ccycd;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPaytype()
    {
        return $this->billinfo_paytype;
    }

    /**
     * @param mixed $billinfo_paytype
     */
    public function setBillinfoPaytype($billinfo_paytype): void
    {
        $this->billinfo_paytype = $billinfo_paytype;
    }

    /**
     * @return mixed
     */
    public function getBillinfoSecpaytype()
    {
        return $this->billinfo_secpaytype;
    }

    /**
     * @param mixed $billinfo_secpaytype
     */
    public function setBillinfoSecpaytype($billinfo_secpaytype): void
    {
        $this->billinfo_secpaytype = $billinfo_secpaytype;
    }

    /**
     * @return mixed
     */
    public function getBillinfoBankid()
    {
        return $this->billinfo_bankid;
    }

    /**
     * @param mixed $billinfo_bankid
     */
    public function setBillinfoBankid($billinfo_bankid): void
    {
        $this->billinfo_bankid = $billinfo_bankid;
    }

    /**
     * @return mixed
     */
    public function getBillinfoKjbndsrl()
    {
        return $this->billinfo_kjbndsrl;
    }

    /**
     * @param mixed $billinfo_kjbndsrl
     */
    public function setBillinfoKjbndsrl($billinfo_kjbndsrl): void
    {
        $this->billinfo_kjbndsrl = $billinfo_kjbndsrl;
    }

    /**
     * @return mixed
     */
    public function getBillinfoKjsmsflg()
    {
        return $this->billinfo_kjsmsflg;
    }

    /**
     * @param mixed $billinfo_kjsmsflg
     */
    public function setBillinfoKjsmsflg($billinfo_kjsmsflg): void
    {
        $this->billinfo_kjsmsflg = $billinfo_kjsmsflg;
    }

    /**
     * @return mixed
     */
    public function getBillinfoSubject()
    {
        return $this->billinfo_subject;
    }

    /**
     * @param mixed $billinfo_subject
     */
    public function setBillinfoSubject($billinfo_subject): void
    {
        $this->billinfo_subject = $billinfo_subject;
    }

    /**
     * @return mixed
     */
    public function getBillinfoGoodsdesc()
    {
        return $this->billinfo_goodsdesc;
    }

    /**
     * @param mixed $billinfo_goodsdesc
     */
    public function setBillinfoGoodsdesc($billinfo_goodsdesc): void
    {
        $this->billinfo_goodsdesc = $billinfo_goodsdesc;
    }

    /**
     * @return mixed
     */
    public function getBillinfoUserid()
    {
        return $this->billinfo_userid;
    }

    /**
     * @param mixed $billinfo_userid
     */
    public function setBillinfoUserid($billinfo_userid): void
    {
        $this->billinfo_userid = $billinfo_userid;
    }

    /**
     * @return mixed
     */
    public function getBillinfoMinitag()
    {
        return $this->billinfo_minitag;
    }

    /**
     * @param mixed $billinfo_minitag
     */
    public function setBillinfoMinitag($billinfo_minitag): void
    {
        $this->billinfo_minitag = $billinfo_minitag;
    }

    /**
     * @return mixed
     */
    public function getBillinfoAppid()
    {
        return $this->billinfo_appid;
    }

    /**
     * @param mixed $billinfo_appid
     */
    public function setBillinfoAppid($billinfo_appid): void
    {
        $this->billinfo_appid = $billinfo_appid;
    }

    /**
     * @return mixed
     */
    public function getReqflg()
    {
        return $this->reqflg;
    }

    /**
     * @param mixed $reqflg
     */
    public function setReqflg($reqflg): void
    {
        $this->reqflg = $reqflg;
    }

    /**
     * @return mixed
     */
    public function getMerchantid()
    {
        return $this->merchantid;
    }

    /**
     * @param mixed $merchantid
     */
    public function setMerchantid($merchantid): void
    {
        $this->merchantid = $merchantid;
    }

    /**
     * @return mixed
     */
    public function getNotificationurl()
    {
        return $this->notificationurl;
    }

    /**
     * @param mixed $notificationurl
     */
    public function setNotificationurl($notificationurl): void
    {
        $this->notificationurl = $notificationurl;
    }

    /**
     * @return mixed
     */
    public function getServnoticurl()
    {
        return $this->servnoticurl;
    }

    /**
     * @param mixed $servnoticurl
     */
    public function setServnoticurl($servnoticurl): void
    {
        $this->servnoticurl = $servnoticurl;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return mixed
     */
    public function getDremark1()
    {
        return $this->dremark1;
    }

    /**
     * @param mixed $dremark1
     */
    public function setDremark1($dremark1): void
    {
        $this->dremark1 = $dremark1;
    }

    /**
     * @return mixed
     */
    public function getDremark2()
    {
        return $this->dremark2;
    }

    /**
     * @param mixed $dremark2
     */
    public function setDremark2($dremark2): void
    {
        $this->dremark2 = $dremark2;
    }

    /**
     * @return mixed
     */
    public function getDremark3()
    {
        return $this->dremark3;
    }

    /**
     * @param mixed $dremark3
     */
    public function setDremark3($dremark3): void
    {
        $this->dremark3 = $dremark3;
    }

    /**
     * @return mixed
     */
    public function getDremark4()
    {
        return $this->dremark4;
    }

    /**
     * @param mixed $dremark4
     */
    public function setDremark4($dremark4): void
    {
        $this->dremark4 = $dremark4;
    }

    /**
     * @return mixed
     */
    public function getDremark5()
    {
        return $this->dremark5;
    }

    /**
     * @param mixed $dremark5
     */
    public function setDremark5($dremark5): void
    {
        $this->dremark5 = $dremark5;
    }

    /**
     * @return mixed
     */
    public function getDremark6()
    {
        return $this->dremark6;
    }

    /**
     * @param mixed $dremark6
     */
    public function setDremark6($dremark6): void
    {
        $this->dremark6 = $dremark6;
    }

    /**
     * @return mixed
     */
    public function getTrsflag()
    {
        return $this->trsflag;
    }

    /**
     * @param mixed $trsflag
     */
    public function setTrsflag($trsflag): void
    {
        $this->trsflag = $trsflag;
    }

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