<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT1032Response extends TrdBaseResponse
{
    /**
     * @var string 0 激活/验证处理中 1 激活/验证成功 2 验证成功，需人工审核激活 4 验证成功，需要再次验证 打款金额 9 激活/验证失败
     */
    protected $state;
    /**
     * @var string
     */
    protected $amount;
    /**
     * @var string
     */
    protected $actideadline;
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
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 银行电子账号
     */
    protected $cltacc_bnkeid;
    /**
     * @var string 银行电子账号
     */
    protected $cltacc_bnkvid;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getActideadline()
    {
        return $this->actideadline;
    }

    /**
     * @param mixed $actideadline
     */
    public function setActideadline($actideadline): void
    {
        $this->actideadline = $actideadline;
    }

    /**
     * @return string
     */
    public function getCltaccCltno(): string
    {
        return $this->cltacc_cltno;
    }

    /**
     * @param string $cltacc_cltno
     */
    public function setCltaccCltno(string $cltacc_cltno): void
    {
        $this->cltacc_cltno = $cltacc_cltno;
    }

    /**
     * @return string
     */
    public function getCltaccCltpid(): string
    {
        return $this->cltacc_cltpid;
    }

    /**
     * @param string $cltacc_cltpid
     */
    public function setCltaccCltpid(string $cltacc_cltpid): void
    {
        $this->cltacc_cltpid = $cltacc_cltpid;
    }

    /**
     * @return string
     */
    public function getCltaccSubno(): string
    {
        return $this->cltacc_subno;
    }

    /**
     * @param string $cltacc_subno
     */
    public function setCltaccSubno(string $cltacc_subno): void
    {
        $this->cltacc_subno = $cltacc_subno;
    }

    /**
     * @return string
     */
    public function getCltaccCltnm(): string
    {
        return $this->cltacc_cltnm;
    }

    /**
     * @param string $cltacc_cltnm
     */
    public function setCltaccCltnm(string $cltacc_cltnm): void
    {
        $this->cltacc_cltnm = $cltacc_cltnm;
    }

    /**
     * @return string
     */
    public function getCltaccBnkeid(): string
    {
        return $this->cltacc_bnkeid;
    }

    /**
     * @param string $cltacc_bnkeid
     */
    public function setCltaccBnkeid(string $cltacc_bnkeid): void
    {
        $this->cltacc_bnkeid = $cltacc_bnkeid;
    }

    /**
     * @return string
     */
    public function getCltaccBnkvid(): string
    {
        return $this->cltacc_bnkvid;
    }

    /**
     * @param string $cltacc_bnkvid
     */
    public function setCltaccBnkvid(string $cltacc_bnkvid): void
    {
        $this->cltacc_bnkvid = $cltacc_bnkvid;
    }


    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS || $this->msghd_rspcode == ResponseCode::E3010) {
            $this->state = ArrayUtil::get('State', $this->responseData);
            $this->amount = ArrayUtil::get('Amount', $this->responseData);
            $cltAcc = ArrayUtil::get('CltAcc', $this->responseData);
            $this->cltacc_cltno = ArrayUtil::get('CltNo', $cltAcc);
            $this->cltacc_cltpid = ArrayUtil::get('CltPid', $cltAcc);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $this->cltacc_bnkvid = ArrayUtil::get('BnkVid', $cltAcc);
            $this->cltacc_bnkeid = ArrayUtil::get('BnkEid', $cltAcc);
        }
    }
}