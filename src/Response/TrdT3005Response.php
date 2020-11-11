<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT3005Response extends TrdBaseResponse
{
    protected $billinfo_orderno;
    protected $billinfo_billno;
    protected $billinfo_platsrl;
    protected $billinfo_billstate;
    protected $billinfo_opion;

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

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $billInfo = ArrayUtil::get('billInfo', $this->responseData, []);
            if ($billInfo) {
                $this->billinfo_orderno = ArrayUtil::get('OrderNo', $billInfo);
                $this->billinfo_billno = ArrayUtil::get('BillNo', $billInfo);
                $this->billinfo_platsrl = ArrayUtil::get('PlatSrl', $billInfo);
                $this->billinfo_billstate = ArrayUtil::get('BillState', $billInfo);
                $this->billinfo_opion = ArrayUtil::get('Opion', $billInfo);
            }
        }
    }
}