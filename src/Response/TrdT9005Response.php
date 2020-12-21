<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\ResponseQuyDaEntity;
use Lmh\Cpcn\Entity\ResponseQuyDaT9005Entity;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT9005Response extends TrdBaseResponse
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
            foreach ($quyDa as $item) {
                $responseQuyDaT9005Entity = new ResponseQuyDaT9005Entity();
                $responseQuyDaT9005Entity->setQuydaCltno(ArrayUtil::get('CltNo', $item));
                $responseQuyDaT9005Entity->setQuydaSubno(ArrayUtil::get('SubNo', $item));
                $responseQuyDaT9005Entity->setQuydaCltnm(ArrayUtil::get('CltNm', $item));
                $responseQuyDaT9005Entity->setQuydaBalamt(ArrayUtil::get('BalAmt', $item));
                $responseQuyDaT9005Entity->setQuydaFrzamt(ArrayUtil::get('FrzAmt', $item));
                $responseQuyDaT9005Entity->setQuydaState(ArrayUtil::get('State', $item));
                $responseQuyDaT9005Entity->setQuydaCcycd(ArrayUtil::get('CcyCd', $item));
                $this->quyDa[] = $responseQuyDaT9005Entity;
            }
        }
    }
}