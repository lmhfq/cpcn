<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class Tx4691Request extends BaseRequest
{
    protected $txCode = '4691';

    /**
     * @throws InvalidConfigException
     * @author lmh
     */
    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'UserID' => $this->getUserId(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}