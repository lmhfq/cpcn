<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4693Response extends BaseResponse
{
    /**
     * @var array 银卡账户列表，出现N次
     */
    protected $bankAccounts = [];

    /**
     * @return array
     */
    public function getBankAccounts(): array
    {
        return $this->bankAccounts;
    }


    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $bankAccounts = ArrayUtil::get('BankAccounts', $this->responseBody, []);
            if (!isset($bankAccounts[0])) {
                $bankAccounts = [$bankAccounts];
            }
            $this->bankAccounts[] = $bankAccounts;
        }
    }
}