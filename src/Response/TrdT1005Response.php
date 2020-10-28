<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;


use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\ResponseCode;

class TrdT1005Response extends TrdBaseResponse
{
    protected $amt_balamt;
    protected $amt_useamt;
    protected $amt_frzamt;
    protected $amt_ccycd;

    /**
     * @return mixed
     */
    public function getAmtBalamt()
    {
        return $this->amt_balamt;
    }

    /**
     * @param mixed $amt_balamt
     */
    public function setAmtBalamt($amt_balamt): void
    {
        $this->amt_balamt = $amt_balamt;
    }

    /**
     * @return mixed
     */
    public function getAmtUseamt()
    {
        return $this->amt_useamt;
    }

    /**
     * @param mixed $amt_useamt
     */
    public function setAmtUseamt($amt_useamt): void
    {
        $this->amt_useamt = $amt_useamt;
    }

    /**
     * @return mixed
     */
    public function getAmtFrzamt()
    {
        return $this->amt_frzamt;
    }

    /**
     * @param mixed $amt_frzamt
     */
    public function setAmtFrzamt($amt_frzamt): void
    {
        $this->amt_frzamt = $amt_frzamt;
    }

    /**
     * @return mixed
     */
    public function getAmtCcycd()
    {
        return $this->amt_ccycd;
    }

    /**
     * @param mixed $amt_ccycd
     */
    public function setAmtCcycd($amt_ccycd): void
    {
        $this->amt_ccycd = $amt_ccycd;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS) {
            $amt = ArrayUtil::get('Amt', $this->responseData, []);
            if ($amt) {
                $this->amt_balamt = ArrayUtil::get('BalAmt', $amt);
                $this->amt_useamt = ArrayUtil::get('UseAmt', $amt);
                $this->amt_frzamt = ArrayUtil::get('FrzAmt', $amt);
                $this->amt_ccycd = ArrayUtil::get('CcyCd', $amt);
            }
        }
    }
}