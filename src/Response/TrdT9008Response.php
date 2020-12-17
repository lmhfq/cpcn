<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\PayResultEntityT9008;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT9008Response extends TrdBaseResponse
{
    protected $talpag;
    protected $curpag;
    protected $talrcd;
    /**
     * @var array
     */
    protected $payRsutList = [];

    /**
     * @return mixed
     */
    public function getTalpag()
    {
        return $this->talpag;
    }

    /**
     * @param mixed $talpag
     */
    public function setTalpag($talpag): void
    {
        $this->talpag = $talpag;
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
    public function getTalrcd()
    {
        return $this->talrcd;
    }

    /**
     * @param mixed $talrcd
     */
    public function setTalrcd($talrcd): void
    {
        $this->talrcd = $talrcd;
    }

    /**
     * @return array
     */
    public function getPayRsutList(): array
    {
        return $this->payRsutList;
    }

    /**
     * @param array $payRsutList
     */
    public function setPayRsutList(array $payRsutList): void
    {
        $this->payRsutList = $payRsutList;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $this->talpag = ArrayUtil::get('TalPag', $this->responseData);
            $this->curpag = ArrayUtil::get('CurPag', $this->responseData);
            $this->talrcd = ArrayUtil::get('TalRcd', $this->responseData);
            $quyDa = ArrayUtil::get('QuyDa', $this->responseData, []);
            if ($quyDa) {
                return;
            }
            foreach ($quyDa as $item) {
                $payResultEntityT9008 = new PayResultEntityT9008();
                $payResultEntityT9008->setQuydaDte(ArrayUtil::get('dte', $item));
                $payResultEntityT9008->setQuydaTme(ArrayUtil::get('tme', $item));
                $payResultEntityT9008->setQuydaMnychgno(ArrayUtil::get('mnyChgNo', $item));
                $payResultEntityT9008->setQuydaSubno(ArrayUtil::get('SubNo', $item));
                $payResultEntityT9008->setQuydaTye(ArrayUtil::get('tye', $item));
                $payResultEntityT9008->setQuydaRsubno(ArrayUtil::get('RSubNo', $item));
                $payResultEntityT9008->setQuydaRcltnm(ArrayUtil::get('RCltNm', $item));
                $payResultEntityT9008->setQuydaAclamt(ArrayUtil::get('AclAmt', $item));
                $payResultEntityT9008->setQuydaFeeamt(ArrayUtil::get('FeeAmt', $item));
                $payResultEntityT9008->setQuydaBalamt(ArrayUtil::get('BalAmt', $item));
                $payResultEntityT9008->setQuydaBsitye(ArrayUtil::get('bsiTye', $item));
                $payResultEntityT9008->setQuydaBsidsc(ArrayUtil::get('bsiDsc', $item));
                $payResultEntityT9008->setQuydaDtrdtype(ArrayUtil::get('DTrdType', $item));
                $payResultEntityT9008->setQuydaDptnsrl(ArrayUtil::get('DPtnSrl', $item));
                $payResultEntityT9008->setQuydaDplatsrl(ArrayUtil::get('DPlatSrl', $item));
                $payResultEntityT9008->setQuydaUsage(ArrayUtil::get('Usage', $item));
                $payResultEntityT9008->setQuydaCcycd(ArrayUtil::get('CcyCd', $item));
                $this->payRsutList[] = $payResultEntityT9008;
            }
        }
    }
}