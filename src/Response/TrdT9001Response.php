<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Entity\PayResultEntityT9001;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT9001Response extends TrdBaseResponse
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
                $payResultEntityT9001 = new PayResultEntityT9001();
                $payResultEntityT9001->setQuydaDte(ArrayUtil::get('dte', $item));
                $payResultEntityT9001->setQuydaTme(ArrayUtil::get('tme', $item));
                $payResultEntityT9001->setQuydaCltno(ArrayUtil::get('CltNo', $item));
                $payResultEntityT9001->setQuydaSubno(ArrayUtil::get('SubNo', $item));
                $payResultEntityT9001->setQuydaCltnm(ArrayUtil::get('CltNm', $item));
                $payResultEntityT9001->setQuydaTye(ArrayUtil::get('tye', $item));
                $payResultEntityT9001->setQuydaPtnsrl(ArrayUtil::get('PtnSrl', $item));
                $payResultEntityT9001->setQuydaPlatsrl(ArrayUtil::get('PlatSrl', $item));
                $this->payRsutList[] = $payResultEntityT9001;
            }
        }
    }
}