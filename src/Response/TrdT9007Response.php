<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\ResponseQuyDaT9007Entity;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT9007Response extends TrdBaseResponse
{
    protected $talpag;
    protected $curpag;
    protected $talrcd;
    /**
     * @var array
     */
    protected $quyDa = [];

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
    public function getQuyDa(): array
    {
        return $this->quyDa;
    }

    /**
     * @param array $quyDa
     */
    public function setQuyDa(array $quyDa): void
    {
        $this->quyDa = $quyDa;
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
                $payResultEntityT9007 = new ResponseQuyDaT9007Entity();
                $payResultEntityT9007->setQuydaDte(ArrayUtil::get('dte', $item));
                $payResultEntityT9007->setQuydaTme(ArrayUtil::get('tme', $item));
                $payResultEntityT9007->setQuydaMnychgno(ArrayUtil::get('mnyChgNo', $item));
                $payResultEntityT9007->setQuydaSubno(ArrayUtil::get('SubNo', $item));
                $payResultEntityT9007->setQuydaTye(ArrayUtil::get('tye', $item));
                $payResultEntityT9007->setQuydaRsubno(ArrayUtil::get('RSubNo', $item));
                $payResultEntityT9007->setQuydaRcltnm(ArrayUtil::get('RCltNm', $item));
                $payResultEntityT9007->setQuydaAclamt(ArrayUtil::get('AclAmt', $item));
                $payResultEntityT9007->setQuydaFeeamt(ArrayUtil::get('FeeAmt', $item));
                $payResultEntityT9007->setQuydaBalamt(ArrayUtil::get('BalAmt', $item));
                $payResultEntityT9007->setQuydaBsitye(ArrayUtil::get('bsiTye', $item));
                $payResultEntityT9007->setQuydaBsidsc(ArrayUtil::get('bsiDsc', $item));
                $payResultEntityT9007->setQuydaDtrdtype(ArrayUtil::get('DTrdType', $item));
                $payResultEntityT9007->setQuydaDptnsrl(ArrayUtil::get('DPtnSrl', $item));
                $payResultEntityT9007->setQuydaDplatsrl(ArrayUtil::get('DPlatSrl', $item));
                $payResultEntityT9007->setQuydaUsage(ArrayUtil::get('Usage', $item));
                $payResultEntityT9007->setQuydaCcycd(ArrayUtil::get('CcyCd', $item));
                $this->quyDa[] = $payResultEntityT9007;
            }
        }
    }
}