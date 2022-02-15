<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2021/3/16
 * Time: 下午5:54
 */

namespace Lmh\Cpcn\Service\Acs\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class NtcT1035Request extends NtcBaseRequest
{
    /**
     * @var string 交易结果： 0 激活/验证办理中 1 激活/验证成功 8 解绑成功 9 激活/验证失败
     */
    protected $state;
    /**
     * @var string
     */
    protected $nextOpt;
    /**
     * @var string 资金账号
     */
    protected $cltacc_subno;
    /**
     * @var string 户名
     */
    protected $cltacc_cltnm;
    /**
     * @var string
     */
    protected $pbusitype;

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getNextOpt(): string
    {
        return $this->nextOpt;
    }

    /**
     * @param string $nextOpt
     */
    public function setNextOpt(string $nextOpt): void
    {
        $this->nextOpt = $nextOpt;
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
    public function getPbusitype(): string
    {
        return $this->pbusitype;
    }

    /**
     * @param string $pbusitype
     */
    public function setPbusitype(string $pbusitype): void
    {
        $this->pbusitype = $pbusitype;
    }

    public function handle(string $message, string $signature)
    {
        parent::process($message, $signature);
        if ($this->noticeData) {
            $cltAcc = ArrayUtil::get('CltAcc', $this->noticeData);
            $this->cltacc_subno = ArrayUtil::get('SubNo', $cltAcc);
            $this->cltacc_cltnm = ArrayUtil::get('CltNm', $cltAcc);
            $this->state = ArrayUtil::get('State', $this->noticeData);
            $this->pbusitype = ArrayUtil::get('PBusiType', $this->noticeData);
        }
    }
}