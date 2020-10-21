<?php
declare(strict_types=1);


namespace Cpcn\Response;


use Cpcn\Support\ArrayUtil;
use Cpcn\Support\ResponseCode;

class TrdT3006Response extends TrdBaseResponse
{
    protected $billinfo_billno;
    protected $billinfo_platsrl;
    protected $billinfo_psubno;
    protected $billinfo_pnm;
    protected $billinfo_rsubno;
    protected $billinfo_rcltnm;
    protected $billinfo_orderno;
    protected $billinfo_aclamt;
    protected $billinfo_payfee;
    protected $billinfo_payeefee;
    protected $billinfo_ccycd;
    protected $billinfo_usage;
    protected $billinfo_goodsmess;
    protected $billinfo_billstate;
    protected $billinfo_opion;
    protected $billinfo_resttime;
    protected $trsflag;

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
    public function getBillinfoPlatsrl()
    {
        return $this->billinfo_platsrl;
    }

    /**
     * @param mixed $billinfo_platsrl
     */
    public function setBillinfoPlatsrl($billinfo_platsrl): void
    {
        $this->billinfo_platsrl = $billinfo_platsrl;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPsubno()
    {
        return $this->billinfo_psubno;
    }

    /**
     * @param mixed $billinfo_psubno
     */
    public function setBillinfoPsubno($billinfo_psubno): void
    {
        $this->billinfo_psubno = $billinfo_psubno;
    }

    /**
     * @return mixed
     */
    public function getBillinfoPnm()
    {
        return $this->billinfo_pnm;
    }

    /**
     * @param mixed $billinfo_pnm
     */
    public function setBillinfoPnm($billinfo_pnm): void
    {
        $this->billinfo_pnm = $billinfo_pnm;
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
    public function getBillinfoUsage()
    {
        return $this->billinfo_usage;
    }

    /**
     * @param mixed $billinfo_usage
     */
    public function setBillinfoUsage($billinfo_usage): void
    {
        $this->billinfo_usage = $billinfo_usage;
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
    public function getBillinfoBillstate()
    {
        return $this->billinfo_billstate;
    }

    /**
     * @param mixed $billinfo_billstate
     */
    public function setBillinfoBillstate($billinfo_billstate): void
    {
        $this->billinfo_billstate = $billinfo_billstate;
    }

    /**
     * @return mixed
     */
    public function getBillinfoOpion()
    {
        return $this->billinfo_opion;
    }

    /**
     * @param mixed $billinfo_opion
     */
    public function setBillinfoOpion($billinfo_opion): void
    {
        $this->billinfo_opion = $billinfo_opion;
    }

    /**
     * @return mixed
     */
    public function getBillinfoResttime()
    {
        return $this->billinfo_resttime;
    }

    /**
     * @param mixed $billinfo_resttime
     */
    public function setBillinfoResttime($billinfo_resttime): void
    {
        $this->billinfo_resttime = $billinfo_resttime;
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


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $billInfo = ArrayUtil::get('billInfo', $this->responseData, []);
            if ($billInfo) {
                $this->billinfo_billno = ArrayUtil::get('BillNo', $billInfo);
                $this->billinfo_platsrl = ArrayUtil::get('PlatSrl', $billInfo);
                $this->billinfo_psubno = ArrayUtil::get('PSubNo', $billInfo);
                $this->billinfo_pnm = ArrayUtil::get('PNm', $billInfo);
                $this->billinfo_rsubno = ArrayUtil::get('RSubNo', $billInfo);
                $this->billinfo_rcltnm = ArrayUtil::get('RCltNm', $billInfo);
                $this->billinfo_orderno = ArrayUtil::get('OrderNo', $billInfo);
                $this->billinfo_aclamt = ArrayUtil::get('AclAmt', $billInfo);
                $this->billinfo_payfee = ArrayUtil::get('PayFee', $billInfo);
                $this->billinfo_payeefee = ArrayUtil::get('PayeeFee', $billInfo);
                $this->billinfo_ccycd = ArrayUtil::get('CcyCd', $billInfo);
                $this->billinfo_usage = ArrayUtil::get('Usage', $billInfo);
                $this->billinfo_goodsmess = ArrayUtil::get('GoodsMess', $billInfo);
                $this->billinfo_billstate = ArrayUtil::get('BillState', $billInfo);
                $this->billinfo_opion = ArrayUtil::get('Opion', $billInfo);
                $this->billinfo_resttime = ArrayUtil::get('RestTime', $billInfo);
            }
            $this->trsflag = ArrayUtil::get('TrsFlag', $this->responseData);
        }
    }
}