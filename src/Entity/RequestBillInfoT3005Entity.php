<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/13
 * Time: 下午10:11
 */

namespace Lmh\Cpcn\Entity;


class RequestBillInfoT3005Entity
{
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
     * @var int  支付金额
     */
    protected $billinfo_aclamt;

    protected $billinfo_payfee = 0;

    protected $billinfo_payeefee = 0;

    protected $billinfo_ccycd = 'CNY';
    /**
     * @var string 资金用途(附言)
     */
    protected $billinfo_usage = '';
    /**
     * @var string 业务标示 A00 普通订单支付 B00 收款方收款成功后，再 冻结资金 B01 付款方解冻资金后，再 支付给收款方
     */
    protected $billinfo_trsflag;

    /**
     * @return string
     */
    public function getBillinfoPsubno(): string
    {
        return $this->billinfo_psubno;
    }

    /**
     * @param string $billinfo_psubno
     */
    public function setBillinfoPsubno(string $billinfo_psubno): void
    {
        $this->billinfo_psubno = $billinfo_psubno;
    }

    /**
     * @return string
     */
    public function getBillinfoPnm(): string
    {
        return $this->billinfo_pnm;
    }

    /**
     * @param string $billinfo_pnm
     */
    public function setBillinfoPnm(string $billinfo_pnm): void
    {
        $this->billinfo_pnm = $billinfo_pnm;
    }

    /**
     * @return string
     */
    public function getBillinfoRsubno(): string
    {
        return $this->billinfo_rsubno;
    }

    /**
     * @param string $billinfo_rsubno
     */
    public function setBillinfoRsubno(string $billinfo_rsubno): void
    {
        $this->billinfo_rsubno = $billinfo_rsubno;
    }

    /**
     * @return string
     */
    public function getBillinfoRcltnm(): string
    {
        return $this->billinfo_rcltnm;
    }

    /**
     * @param string $billinfo_rcltnm
     */
    public function setBillinfoRcltnm(string $billinfo_rcltnm): void
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
     * @return string
     */
    public function getBillinfoBillno(): string
    {
        return $this->billinfo_billno;
    }

    /**
     * @param string $billinfo_billno
     */
    public function setBillinfoBillno(string $billinfo_billno): void
    {
        $this->billinfo_billno = $billinfo_billno;
    }

    /**
     * @return int
     */
    public function getBillinfoAclamt(): int
    {
        return $this->billinfo_aclamt;
    }

    /**
     * @param int $billinfo_aclamt
     */
    public function setBillinfoAclamt(int $billinfo_aclamt): void
    {
        $this->billinfo_aclamt = $billinfo_aclamt;
    }

    /**
     * @return int
     */
    public function getBillinfoPayfee(): int
    {
        return $this->billinfo_payfee;
    }

    /**
     * @param string $billinfo_payfee
     */
    public function setBillinfoPayfee(string $billinfo_payfee): void
    {
        $this->billinfo_payfee = $billinfo_payfee;
    }

    /**
     * @return int
     */
    public function getBillinfoPayeefee(): int
    {
        return $this->billinfo_payeefee;
    }

    /**
     * @param string $billinfo_payeefee
     */
    public function setBillinfoPayeefee(string $billinfo_payeefee): void
    {
        $this->billinfo_payeefee = $billinfo_payeefee;
    }

    /**
     * @return string
     */
    public function getBillinfoCcycd(): string
    {
        return $this->billinfo_ccycd;
    }

    /**
     * @param string $billinfo_ccycd
     */
    public function setBillinfoCcycd(string $billinfo_ccycd): void
    {
        $this->billinfo_ccycd = $billinfo_ccycd;
    }

    /**
     * @return string
     */
    public function getBillinfoUsage(): string
    {
        return $this->billinfo_usage;
    }

    /**
     * @param string $billinfo_usage
     */
    public function setBillinfoUsage(string $billinfo_usage): void
    {
        $this->billinfo_usage = $billinfo_usage;
    }

    /**
     * @return string
     */
    public function getBillinfoTrsflag(): string
    {
        return $this->billinfo_trsflag;
    }

    /**
     * @param string $billinfo_trsflag
     */
    public function setBillinfoTrsflag(string $billinfo_trsflag): void
    {
        $this->billinfo_trsflag = $billinfo_trsflag;
    }


}