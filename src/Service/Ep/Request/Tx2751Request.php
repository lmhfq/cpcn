<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx2751Request extends BaseRequest
{
    protected $txCode = '2751';
    /**
     * @var string 账号
     */
    protected $accountNumber;

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'AccountNumber' => $this->getAccountNumber(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }
}