<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT1008Response extends TrdBaseResponse
{
    protected $bankinfo_bkid;
    protected $bankinfo_bknm;
    protected $bankinfo_sta;
    protected $bankinfo_reason;
    protected $bankinfo_zhbankid;
    protected $bankinfo_busitype;

    /**
     * @return mixed
     */
    public function getBankinfoBkid()
    {
        return $this->bankinfo_bkid;
    }

    /**
     * @param mixed $bankinfo_bkid
     */
    public function setBankinfoBkid($bankinfo_bkid): void
    {
        $this->bankinfo_bkid = $bankinfo_bkid;
    }

    /**
     * @return mixed
     */
    public function getBankinfoBknm()
    {
        return $this->bankinfo_bknm;
    }

    /**
     * @param mixed $bankinfo_bknm
     */
    public function setBankinfoBknm($bankinfo_bknm): void
    {
        $this->bankinfo_bknm = $bankinfo_bknm;
    }

    /**
     * @return mixed
     */
    public function getBankinfoSta()
    {
        return $this->bankinfo_sta;
    }

    /**
     * @param mixed $bankinfo_sta
     */
    public function setBankinfoSta($bankinfo_sta): void
    {
        $this->bankinfo_sta = $bankinfo_sta;
    }

    /**
     * @return mixed
     */
    public function getBankinfoReason()
    {
        return $this->bankinfo_reason;
    }

    /**
     * @param mixed $bankinfo_reason
     */
    public function setBankinfoReason($bankinfo_reason): void
    {
        $this->bankinfo_reason = $bankinfo_reason;
    }

    /**
     * @return mixed
     */
    public function getBankinfoZhbankid()
    {
        return $this->bankinfo_zhbankid;
    }

    /**
     * @param mixed $bankinfo_zhbankid
     */
    public function setBankinfoZhbankid($bankinfo_zhbankid): void
    {
        $this->bankinfo_zhbankid = $bankinfo_zhbankid;
    }

    /**
     * @return mixed
     */
    public function getBankinfoBusitype()
    {
        return $this->bankinfo_busitype;
    }

    /**
     * @param mixed $bankinfo_busitype
     */
    public function setBankinfoBusitype($bankinfo_busitype): void
    {
        $this->bankinfo_busitype = $bankinfo_busitype;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $bankInfo = ArrayUtil::get('BankInfo', $this->responseData, []);
            $this->bankinfo_bkid = ArrayUtil::get('BkId', $bankInfo);
            $this->bankinfo_bknm = ArrayUtil::get('BkNm', $bankInfo);
            $this->bankinfo_sta = ArrayUtil::get('Sta', $bankInfo);
            $this->bankinfo_reason = ArrayUtil::get('Reason', $bankInfo);
            $this->bankinfo_zhbankid = ArrayUtil::get('ZhBankid', $bankInfo);
            $this->bankinfo_busitype = ArrayUtil::get('BusiType', $bankInfo);
        }
    }
}