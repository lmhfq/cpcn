<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\ResponseCode;

class TrdT1017Response extends TrdBaseResponse
{
    protected $paybnk_bkid;
    protected $paybnk_openbkcd;
    protected $paybnk_openbknm;
    protected $paybnk_citycd;

    /**
     * @return mixed
     */
    public function getPaybnkBkid()
    {
        return $this->paybnk_bkid;
    }

    /**
     * @param mixed $paybnk_bkid
     */
    public function setPaybnkBkid($paybnk_bkid): void
    {
        $this->paybnk_bkid = $paybnk_bkid;
    }

    /**
     * @return mixed
     */
    public function getPaybnkOpenbkcd()
    {
        return $this->paybnk_openbkcd;
    }

    /**
     * @param mixed $paybnk_openbkcd
     */
    public function setPaybnkOpenbkcd($paybnk_openbkcd): void
    {
        $this->paybnk_openbkcd = $paybnk_openbkcd;
    }

    /**
     * @return mixed
     */
    public function getPaybnkOpenbknm()
    {
        return $this->paybnk_openbknm;
    }

    /**
     * @param mixed $paybnk_openbknm
     */
    public function setPaybnkOpenbknm($paybnk_openbknm): void
    {
        $this->paybnk_openbknm = $paybnk_openbknm;
    }

    /**
     * @return mixed
     */
    public function getPaybnkCitycd()
    {
        return $this->paybnk_citycd;
    }

    /**
     * @param mixed $paybnk_citycd
     */
    public function setPaybnkCitycd($paybnk_citycd): void
    {
        $this->paybnk_citycd = $paybnk_citycd;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $payBnk = ArrayUtil::get('PayBnk', $this->responseData, []);
            if ($payBnk) {
                $this->paybnk_bkid = ArrayUtil::get('BkId', $payBnk);
                $this->paybnk_openbkcd = ArrayUtil::get('OpenBkCd', $payBnk);
                $this->paybnk_openbknm = ArrayUtil::get('OpenBkNm', $payBnk);
                $this->paybnk_citycd = ArrayUtil::get('CityCd', $payBnk);
            }
        }
    }
}