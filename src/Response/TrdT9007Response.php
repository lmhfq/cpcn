<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\ResponseQuyDaEntity;
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
                $responseQuyDaEntity = new ResponseQuyDaEntity();
                $responseQuyDaEntity->setQuydaDte(ArrayUtil::get('dte', $item));
                $responseQuyDaEntity->setQuydaTme(ArrayUtil::get('tme', $item));
                $responseQuyDaEntity->setQuydaMnychgno(ArrayUtil::get('mnyChgNo', $item));
                $responseQuyDaEntity->setQuydaSubno(ArrayUtil::get('SubNo', $item));
                $responseQuyDaEntity->setQuydaTye(ArrayUtil::get('tye', $item));
                $responseQuyDaEntity->setQuydaRsubno(ArrayUtil::get('RSubNo', $item));
                $responseQuyDaEntity->setQuydaRcltnm(ArrayUtil::get('RCltNm', $item));
                $responseQuyDaEntity->setQuydaAclamt(ArrayUtil::get('AclAmt', $item));
                $responseQuyDaEntity->setQuydaFeeamt(ArrayUtil::get('FeeAmt', $item));
                $responseQuyDaEntity->setQuydaBalamt(ArrayUtil::get('BalAmt', $item));
                $responseQuyDaEntity->setQuydaBsitye(ArrayUtil::get('bsiTye', $item));
                $responseQuyDaEntity->setQuydaBsidsc(ArrayUtil::get('bsiDsc', $item));
                $responseQuyDaEntity->setQuydaDtrdtype(ArrayUtil::get('DTrdType', $item));
                $responseQuyDaEntity->setQuydaDptnsrl(ArrayUtil::get('DPtnSrl', $item));
                $responseQuyDaEntity->setQuydaDplatsrl(ArrayUtil::get('DPlatSrl', $item));
                $responseQuyDaEntity->setQuydaUsage(ArrayUtil::get('Usage', $item));
                $responseQuyDaEntity->setQuydaCcycd(ArrayUtil::get('CcyCd', $item));
                $this->quyDa[] = $responseQuyDaEntity;
            }
        }
    }
}