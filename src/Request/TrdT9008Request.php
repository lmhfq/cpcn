<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class TrdT9008Request extends TrdBaseRequest
{
    protected $msghd_trcd = "T9008";

    /**
     * @var string 查询日期 YYYYMMDD
     */
    protected $quydt;
    /**
     * @var string 起始日期 YYYYMMDD 查询日期和起止日期，必填一组
     */
    protected $quystdt;
    /**
     * @var string 结束日期 YYYYMMDD 查询日期和起止日期，必填一组
     */
    protected $quyenddt;
    /**
     * @var string 资金账号
     */
    protected $subno;
    /**
     * @var string 类型(C:增加、T:减少)
     */
    protected $tye;
    /**
     * @var string 发生额-起始金额 若填值，大于 0 时生效
     */
    protected $aclamtbgn;
    /**
     * @var string 发生额-截止金额 若填值，大于 0 时生效
     */
    protected $aclamtend;
    /**
     * @var string 业务类型 INMNY 入金; OTMNY 出金; FRZE 冻结; UNFRZE 解冻; PAYMNY 付款; RCVMNY 收款 支持同时传入多个值，使用 半角英文逗号隔开
     */
    protected $bsitye;
    /**
     * @var string 原交易-类型 TNSTRD 出入金业务 PAYTRD 支付业务 FRETRD 冻结解冻业务 SHFKTRD 收款业务 IMPRESTTRD 预付款业务 INPAYTRD 入金支付 RFDTRD 原路退款业务 RFDPYTRD 支付退款业务 JUHETRD 聚合支付业务 OTHTRD 其他业务 支持同时传入多个值，使用 半角英文逗号隔开
     */
    protected $dtrdtype;
    /**
     * @var string 原合作方交易流水号
     */
    protected $dptnsrl;
    /**
     * @var string 原平台交易流水号
     */
    protected $dplatsrl;
    /**
     * @var int 分页查询：每页 N 条数据 (10<=N<=200)
     */
    protected $pagsiz;
    /**
     * @var int 分页查询：当前页数
     */
    protected $curpag;
    /**
     * @var string 排序规则 10 明细编号-正序（默认） 11 明细编号-倒序
     */
    protected $sortr;

    /**
     * @return mixed
     */
    public function getQuydt()
    {
        return $this->quydt;
    }

    /**
     * @param mixed $quydt
     */
    public function setQuydt($quydt): void
    {
        $this->quydt = $quydt;
    }

    /**
     * @return mixed
     */
    public function getQuystdt()
    {
        return $this->quystdt;
    }

    /**
     * @param mixed $quystdt
     */
    public function setQuystdt($quystdt): void
    {
        $this->quystdt = $quystdt;
    }

    /**
     * @return mixed
     */
    public function getQuyenddt()
    {
        return $this->quyenddt;
    }

    /**
     * @param mixed $quyenddt
     */
    public function setQuyenddt($quyenddt): void
    {
        $this->quyenddt = $quyenddt;
    }

    /**
     * @return mixed
     */
    public function getSubno()
    {
        return $this->subno;
    }

    /**
     * @param mixed $subno
     */
    public function setSubno($subno): void
    {
        $this->subno = $subno;
    }

    /**
     * @return mixed
     */
    public function getTye()
    {
        return $this->tye;
    }

    /**
     * @param mixed $tye
     */
    public function setTye($tye): void
    {
        $this->tye = $tye;
    }

    /**
     * @return mixed
     */
    public function getAclamtbgn()
    {
        return $this->aclamtbgn;
    }

    /**
     * @param mixed $aclamtbgn
     */
    public function setAclamtbgn($aclamtbgn): void
    {
        $this->aclamtbgn = $aclamtbgn;
    }

    /**
     * @return mixed
     */
    public function getAclamtend()
    {
        return $this->aclamtend;
    }

    /**
     * @param mixed $aclamtend
     */
    public function setAclamtend($aclamtend): void
    {
        $this->aclamtend = $aclamtend;
    }

    /**
     * @return mixed
     */
    public function getBsitye()
    {
        return $this->bsitye;
    }

    /**
     * @param mixed $bsitye
     */
    public function setBsitye($bsitye): void
    {
        $this->bsitye = $bsitye;
    }

    /**
     * @return mixed
     */
    public function getDtrdtype()
    {
        return $this->dtrdtype;
    }

    /**
     * @param mixed $dtrdtype
     */
    public function setDtrdtype($dtrdtype): void
    {
        $this->dtrdtype = $dtrdtype;
    }

    /**
     * @return mixed
     */
    public function getDptnsrl()
    {
        return $this->dptnsrl;
    }

    /**
     * @param mixed $dptnsrl
     */
    public function setDptnsrl($dptnsrl): void
    {
        $this->dptnsrl = $dptnsrl;
    }

    /**
     * @return mixed
     */
    public function getDplatsrl()
    {
        return $this->dplatsrl;
    }

    /**
     * @param mixed $dplatsrl
     */
    public function setDplatsrl($dplatsrl): void
    {
        $this->dplatsrl = $dplatsrl;
    }

    /**
     * @return mixed
     */
    public function getPagsiz()
    {
        return $this->pagsiz;
    }

    /**
     * @param mixed $pagsiz
     */
    public function setPagsiz($pagsiz): void
    {
        $this->pagsiz = $pagsiz;
    }

    /**
     * @return mixed
     */
    public function getCurpag()
    {
        return $this->curpag;
    }

    /**
     * @param mixed $curpag
     */
    public function setCurpag($curpag): void
    {
        $this->curpag = $curpag;
    }

    /**
     * @return mixed
     */
    public function getSortr()
    {
        return $this->sortr;
    }

    /**
     * @param mixed $sortr
     */
    public function setSortr($sortr): void
    {
        $this->sortr = $sortr;
    }

    /**
     * @throws InvalidConfigException
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getMsghd());

        $data = array_merge($data, [
            'QuyDt' => $this->quydt,
            'QuyStDt' => $this->quystdt,
            'QuyEndDt' => $this->quyenddt,
            'SubNo' => $this->subno,
            'PagSiz' => $this->pagsiz,
            'CurPag' => $this->curpag,
            'SortR' => $this->sortr,
        ]);
        if ($this->subno) {
            $data['SubNo'] = $this->subno;
        }
        if ($this->tye) {
            $data['tye'] = $this->tye;
        }
        if ($this->aclamtbgn) {
            $data['AclAmtBgn'] = $this->aclamtbgn;
        }
        if ($this->aclamtend) {
            $data['AclAmtEnd'] = $this->aclamtend;
        }
        if ($this->dtrdtype) {
            $data['DTrdType'] = $this->dtrdtype;
        }
        if ($this->dptnsrl) {
            $data['DPtnSrl'] = $this->dptnsrl;
        }
        if ($this->dplatsrl) {
            $data['DPlatSrl'] = $this->dplatsrl;
        }
        $xml = Xml::build($data);
        parent::process($xml);
    }
}