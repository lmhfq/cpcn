<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT3004Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T3004";
    /**
     * @var string 付款方资金账号
     */
    protected $billinfo_psubno;
    /**
     * @var string 付款方户名
     */
    protected $billinfo_pnm;
    /**
     * @var string 收款方资金账号
     */
    protected $billinfo_rsubno;
    /**
     * @var string 收款方户名
     */
    protected $billinfo_rcltnm;

    protected $billinfo_orderno;
    /**
     * @var string 支付单号
     */
    protected $billinfo_billno;
    /**
     * @var string  支付金额
     */
    protected $billinfo_aclamt;
    /**
     * @var string 付款方手续费,默认 0
     */
    protected $billinfo_payfee;
    /**
     * @var string 收款方手续费,默认 0
     */
    protected $billinfo_payeefee;

    protected $billinfo_ccycd = 'CNY';
    /**
     * @var string 资金用途(附言)
     */
    protected $billinfo_usage = '';
    /**
     * @var string 商品信息
     */
    protected $billinfo_goodsmess;
    /**
     * @var string 业务标示 A00 普通订单支付 B00 收款方收款成功后，再冻结资金 B01 付款方解冻资金后，再 支付给收款方 Y01 预付款 资金资金支付 后生成预付款 Y02 冲抵预付款 按照预付 款生产时间积累减少预付款 可用额度
     */
    protected $trsflag;

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
            'billInfo' => [
                'PSubNo' => $this->billinfo_psubno,
                'PNm' => $this->billinfo_pnm,
                'RSubNo' => $this->billinfo_rsubno,
                'RCltNm' => $this->billinfo_rcltnm,
                'OrderNo' => $this->billinfo_orderno,
                'BillNo' => $this->billinfo_billno,
                'AclAmt' => $this->billinfo_aclamt,
                'PayFee' => $this->billinfo_payfee,
                'PayeeFee' => $this->billinfo_payeefee,
                'CcyCd' => $this->billinfo_ccycd,
                'Usage' => $this->billinfo_usage,
                'GoodsMess' => $this->billinfo_goodsmess,
            ],
            'TrsFlag' => $this->trsflag,
        ]);
        $xml = Xml::build($data);
        parent::process($xml);
    }
}