<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Constant\ResponseCode;

class TrdT1002Response extends TrdBaseResponse
{
    /**
     * @var string 客户号
     */
    protected $cltacc_cltno;
    /**
     * @var string 平台客户号
     */
    protected $cltacc_cltpid;
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string
     */
    protected $cltacc_cltnm;
    /**
     * @var string 银行电子账号（跨行收款 账号）
     */
    protected $cltacc_bnkeid;
    protected $cltacc_openbkcd;
    protected $cltacc_openbknm;
    protected $cltacc_acctcd;
    /**
     * @var string 开户状态 0: 开户中 1: 已开户 3: 已销户 4: 冻结 8: 开户失败 A：开户成功但信息异常
     */
    protected $stat;
    /**
     * @var string 失败原因
     */
    protected $opion;


    /**
     * @return mixed
     */
    public function getCltaccCltno()
    {
        return $this->cltacc_cltno;
    }

    /**
     * @param mixed $cltacc_cltno
     */
    public function setCltaccCltno($cltacc_cltno): void
    {
        $this->cltacc_cltno = $cltacc_cltno;
    }

    /**
     * @return mixed
     */
    public function getCltaccCltpid()
    {
        return $this->cltacc_cltpid;
    }

    /**
     * @param mixed $cltacc_cltpid
     */
    public function setCltaccCltpid($cltacc_cltpid): void
    {
        $this->cltacc_cltpid = $cltacc_cltpid;
    }

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
    public function getCltaccBnkeid()
    {
        return $this->cltacc_bnkeid;
    }

    /**
     * @param mixed $cltacc_bnkeid
     */
    public function setCltaccBnkeid($cltacc_bnkeid): void
    {
        $this->cltacc_bnkeid = $cltacc_bnkeid;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbkcd()
    {
        return $this->cltacc_openbkcd;
    }

    /**
     * @param mixed $cltacc_openbkcd
     */
    public function setCltaccOpenbkcd($cltacc_openbkcd): void
    {
        $this->cltacc_openbkcd = $cltacc_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getCltaccOpenbknm()
    {
        return $this->cltacc_openbknm;
    }

    /**
     * @param mixed $cltacc_openbknm
     */
    public function setCltaccOpenbknm($cltacc_openbknm): void
    {
        $this->cltacc_openbknm = $cltacc_openbknm;
    }

    /**
     * @return mixed
     */
    public function getCltaccAcctcd()
    {
        return $this->cltacc_acctcd;
    }

    /**
     * @param mixed $cltacc_acctcd
     */
    public function setCltaccAcctcd($cltacc_acctcd): void
    {
        $this->cltacc_acctcd = $cltacc_acctcd;
    }

    /**
     * @return string
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * @param mixed $stat
     */
    public function setStat($stat): void
    {
        $this->stat = $stat;
    }

    /**
     * @return string
     */
    public function getOpion(): string
    {
        return $this->opion;
    }

    /**
     * @param string $opion
     */
    public function setOpion(string $opion): void
    {
        $this->opion = $opion;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData, []);
            if ($cltAcc) {
                $this->cltacc_cltno = ArrayUtil::get('CltNo', $cltAcc);
                $this->cltacc_cltpid = ArrayUtil::get('CltPid', $cltAcc);
                $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
                $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
                $this->cltacc_bnkeid = ArrayUtil::get('BnkEid', $cltAcc);
                $this->cltacc_openbkcd = ArrayUtil::get('OpenBkCd', $cltAcc);
                $this->cltacc_openbknm = ArrayUtil::get('OpenBkNm', $cltAcc);
                $this->cltacc_acctcd = ArrayUtil::get('AcctCd', $cltAcc);
            }
            $this->stat = ArrayUtil::get('Stat', $this->responseData);
            $this->opion = $cltAcc = ArrayUtil::get('Opion', $this->responseData);
        }
    }
}