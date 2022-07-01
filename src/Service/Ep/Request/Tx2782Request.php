<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx2782Request extends BaseRequest
{
    protected $txCode = '2782';
    /**
     * @var string 申请流水号
     */
    protected $applyNo;

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ApplyNo' => $this->getApplyNo(),
            'UserID' => $this->getUserId(),
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
    public function getApplyNo(): string
    {
        return $this->applyNo;
    }

}