<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Acs\Notify;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\ArrayUtil;

class NtcT2020Request extends NtcBaseRequest
{
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string 资金用途(附言)
     */
    protected $usage;
    /**
     * @var string 结算状态 1 已发送结算申请 2 结算失败
     */
    protected $ubalsta;
    /**
     * @var string 出金结算时间(查询出金结果时返回) 格式 YYYYMMDDHH24MISS UBalSta=1 时指成功发送结 算申请的时间
     */
    protected $ubaltim;
    /**
     * @var string 原交易日期
     */
    protected $fdate;
    /**
     * @var string 原交易时间
     */
    protected $ftime;
    /**
     * @var  string
     */
    protected $spec1;
    /**
     * @var string 备用 2 UBalSta=2 时返回失败原因
     */
    protected $spec2;

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
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * @param string $usage
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * @return string
     */
    public function getUbalsta(): string
    {
        return $this->ubalsta;
    }

    /**
     * @param string $ubalsta
     */
    public function setUbalsta(string $ubalsta): void
    {
        $this->ubalsta = $ubalsta;
    }

    /**
     * @return string
     */
    public function getUbaltim(): string
    {
        return $this->ubaltim;
    }

    /**
     * @param string $ubaltim
     */
    public function setUbaltim(string $ubaltim): void
    {
        $this->ubaltim = $ubaltim;
    }

    /**
     * @return string
     */
    public function getFdate(): string
    {
        return $this->fdate;
    }

    /**
     * @param string $fdate
     */
    public function setFdate(string $fdate): void
    {
        $this->fdate = $fdate;
    }

    /**
     * @return string
     */
    public function getFtime(): string
    {
        return $this->ftime;
    }

    /**
     * @param string $ftime
     */
    public function setFtime(string $ftime): void
    {
        $this->ftime = $ftime;
    }

    /**
     * @return string
     */
    public function getSpec1(): string
    {
        return $this->spec1;
    }

    /**
     * @param string $spec1
     */
    public function setSpec1(string $spec1): void
    {
        $this->spec1 = $spec1;
    }

    /**
     * @return string
     */
    public function getSpec2(): string
    {
        return $this->spec2;
    }

    /**
     * @param string $spec2
     */
    public function setSpec2(string $spec2): void
    {
        $this->spec2 = $spec2;
    }


    /**
     * @param string $message
     * @param string $signature
     * @throws InvalidConfigException
     */
    public function handle(string $message, string $signature)
    {
        parent::process($message, $signature);
        if ($this->noticeData) {
            $cltAcc = ArrayUtil::get('CltAcc', $this->noticeData);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $this->ubalsta = ArrayUtil::get('UBalSta', $this->noticeData);
            $this->ubaltim = ArrayUtil::get('UBalTim', $this->noticeData);
            $this->usage = ArrayUtil::get('Usage', $this->noticeData);
            $this->fdate = ArrayUtil::get('FDate', $this->noticeData);
            $this->ftime = ArrayUtil::get('FTime', $this->noticeData);
            $this->spec1 = ArrayUtil::get('Spec1', $this->noticeData);
            $this->spec2 = ArrayUtil::get('Spec2', $this->noticeData);
        }
    }
}