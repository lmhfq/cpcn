<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;

use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class TrdT3004Response extends TrdBaseResponse
{

    protected $srl_billno;

    /**
     * @return mixed
     */
    public function getSrlBillno()
    {
        return $this->srl_billno;
    }

    /**
     * @param mixed $srl_billno
     */
    public function setSrlBillno($srl_billno): void
    {
        $this->srl_billno = $srl_billno;
    }

    public function handle(string $message)
    {
        parent::process($message);
        if ($this->msghd_rspcode == ResponseCode::SUCCESS || $this->msghd_rspcode == ResponseCode::PYSUCC) {
            $srl = ArrayUtil::get('Srl', $this->responseData, []);
            $this->srl_billno = ArrayUtil::get('BillNo', $srl, '');
        }
    }
}