<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Entity;

class ResponseQuyDaT9005Entity
{
    /**
     * @var string 客户号
     */
    protected $quyda_cltno;
    /**
     * @var string 资金账号
     */
    protected $quyda_subno;
    /**
     * @var string 户名
     */
    protected $quyda_cltnm;
    /**
     * @var integer 资金余额
     */
    protected $quyda_balamt;
    /**
     * @var integer 冻结余额
     */
    protected $quyda_frzamt;
    /**
     * @var integer 状态:1 已开户;4 冻结
     */
    protected $quyda_state;
    protected $quyda_ccycd;

    /**
     * @return mixed
     */
    public function getQuydaCltno()
    {
        return $this->quyda_cltno;
    }

    /**
     * @param mixed $quyda_cltno
     */
    public function setQuydaCltno($quyda_cltno): void
    {
        $this->quyda_cltno = $quyda_cltno;
    }

    /**
     * @return mixed
     */
    public function getQuydaSubno()
    {
        return $this->quyda_subno;
    }

    /**
     * @param mixed $quyda_subno
     */
    public function setQuydaSubno($quyda_subno): void
    {
        $this->quyda_subno = $quyda_subno;
    }

    /**
     * @return mixed
     */
    public function getQuydaCltnm()
    {
        return $this->quyda_cltnm;
    }

    /**
     * @param mixed $quyda_cltnm
     */
    public function setQuydaCltnm($quyda_cltnm): void
    {
        $this->quyda_cltnm = $quyda_cltnm;
    }

    /**
     * @return mixed
     */
    public function getQuydaBalamt()
    {
        return $this->quyda_balamt;
    }

    /**
     * @param mixed $quyda_balamt
     */
    public function setQuydaBalamt($quyda_balamt): void
    {
        $this->quyda_balamt = $quyda_balamt;
    }

    /**
     * @return mixed
     */
    public function getQuydaFrzamt()
    {
        return $this->quyda_frzamt;
    }

    /**
     * @param mixed $quyda_frzamt
     */
    public function setQuydaFrzamt($quyda_frzamt): void
    {
        $this->quyda_frzamt = $quyda_frzamt;
    }

    /**
     * @return mixed
     */
    public function getQuydaState()
    {
        return $this->quyda_state;
    }

    /**
     * @param mixed $quyda_state
     */
    public function setQuydaState($quyda_state): void
    {
        $this->quyda_state = $quyda_state;
    }

    /**
     * @return mixed
     */
    public function getQuydaCcycd()
    {
        return $this->quyda_ccycd;
    }

    /**
     * @param mixed $quyda_ccycd
     */
    public function setQuydaCcycd($quyda_ccycd): void
    {
        $this->quyda_ccycd = $quyda_ccycd;
    }
}