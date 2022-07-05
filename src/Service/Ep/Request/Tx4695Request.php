<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4695Request extends BaseRequest
{
    protected $txCode = '4695';

    /**
     * @var string 10-余额支付 20-用户收单 30-用户代付 40-用户分账 41-用户收款
     */
    protected $authType;

    /**
     * @return string
     */
    public function getAuthType(): ?string
    {
        return $this->authType;
    }

    /**
     * @param string $authType
     */
    public function setAuthType(string $authType): void
    {
        $this->authType = $authType;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'UserID' => $this->getUserId()
        ];
        if ($this->getAuthType()) {
            $body['AuthType'] = $this->getAuthType();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}