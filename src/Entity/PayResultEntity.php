<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/23
 * Time: 下午2:03
 */

namespace Lmh\Cpcn\Entity;


class PayResultEntity
{
    protected $orderNo;
    protected $billno;
    protected $platsrl;
    protected $billstate;
    protected $opion;

    /**
     * @return mixed
     */
    public function getOrderNo()
    {
        return $this->orderNo;
    }

    /**
     * @param mixed $orderNo
     */
    public function setOrderNo($orderNo): void
    {
        $this->orderNo = $orderNo;
    }

    /**
     * @return mixed
     */
    public function getBillno()
    {
        return $this->billno;
    }

    /**
     * @param mixed $billno
     */
    public function setBillno($billno): void
    {
        $this->billno = $billno;
    }

    /**
     * @return mixed
     */
    public function getPlatsrl()
    {
        return $this->platsrl;
    }

    /**
     * @param mixed $platsrl
     */
    public function setPlatsrl($platsrl): void
    {
        $this->platsrl = $platsrl;
    }

    /**
     * @return mixed
     */
    public function getBillstate()
    {
        return $this->billstate;
    }

    /**
     * @param mixed $billstate
     */
    public function setBillstate($billstate): void
    {
        $this->billstate = $billstate;
    }

    /**
     * @return mixed
     */
    public function getOpion()
    {
        return $this->opion;
    }

    /**
     * @param mixed $opion
     */
    public function setOpion($opion): void
    {
        $this->opion = $opion;
    }


}