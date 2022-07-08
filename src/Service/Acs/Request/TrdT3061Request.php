<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3061Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3061";

    protected $cltacc_subno;

    protected $cltacc_cltnm;

    protected $amt_aclamt;

    protected $amt_ccycd;

    protected $billinfo_rsubno;

    protected $billinfo_rcltnm;

    protected $billinfo_billno;

    protected $billinfo_orderno;

    protected $billinfo_billamt;

    protected $billinfo_aclamt;

    protected $billinfo_payfee;

    protected $billinfo_payeefee;

    protected $billinfo_ccycd;

    protected $billinfo_paytype;

    protected $billinfo_secpaytype;

    protected $billinfo_bankid;

    protected $billinfo_kjbndsrl;

    protected $billinfo_kjsmsflg;

    protected $billinfo_subject;

    protected $billinfo_goodsdesc;

    protected $billinfo_userid;

    protected $billinfo_minitag;

    protected $billinfo_goodsmess;

    protected $billinfo_appid;

    protected $reqflg;

    protected $merchantid;

    protected $notificationurl;

    protected $usage;

    protected $trsflag;

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
    public function getAmtAclamt()
    {
        return $this->amt_aclamt;
    }

    /**
     * @param mixed $amt_aclamt
     */
    public function setAmtAclamt($amt_aclamt): void
    {
        $this->amt_aclamt = $amt_aclamt;
    }

    /**
     * @return mixed
     */
    public function getAmtCcycd()
    {
        return $this->amt_ccycd;
    }

    /**
     * @param mixed $amt_ccycd
     */
    public function setAmtCcycd($amt_ccycd): void
    {
        $this->amt_ccycd = $amt_ccycd;
    }

    /**
     * @return mixed
     */
    public function getBillinfoRsubno()
    {
        return $this->billinfo_rsubno;
    }

    /**
     * @param mixed $billinfo_rsubno
     */
    public function setBillinfoRsubno($billinfo_rsubno): void
    {
        $this->billinfo_rsubno = $billinfo_rsubno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoRcltnm()
    {
        return $this->billinfo_rcltnm;
    }

    /**
     * @param mixed $billinfo_rcltnm
     */
    public function setBillinfoRcltnm($billinfo_rcltnm): void
    {
        $this->billinfo_rcltnm = $billinfo_rcltnm;
    }

    /**
     * @return mixed
     */
    public function getBillinfoBillno()
    {
        return $this->billinfo_billno;
    }

    /**
     * @param mixed $billinfo_billno
     */
    public function setBillinfoBillno($billinfo_billno): void
    {
        $this->billinfo_billno = $billinfo_billno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoOrderno()
    {
        return $this->billinfo_orderno;
    }

    /**
     * @param mixed $billinfo_orderno
     */
    public function setBillinfoOrderno($billinfo_orderno): void
    {
        $this->billinfo_orderno = $billinfo_orderno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoBillamt()
    {
        return $this->billinfo_billamt;
    }

    /**
     * @param mixed $billinfo_billamt
     */
    public function setBillinfoBillamt($billinfo_billamt): void
    {
        $this->billinfo_billamt = $billinfo_billamt;
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
    public function getBillinfoPayfee()
    {
        return $this->billinfo_payfee;
    }

    /**
     * @param mixed $billinfo_payfee
     */
    public function setBillinfoPayfee($billinfo_payfee): void
    {
        $this->billinfo_payfee = $billinfo_payfee;
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
    public function getBillinfoGoodsmess()
    {
        return $this->billinfo_goodsmess;
    }

    /**
     * @param mixed $billinfo_goodsmess
     */
    public function setBillinfoGoodsmess($billinfo_goodsmess): void
    {
        $this->billinfo_goodsmess = $billinfo_goodsmess;
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