<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx2783Request extends BaseRequest
{
    protected $txCode = '2783';
    /**
     * @var string
     */
    protected $revokeApplyNo;
    /**
     * @var string 申请流水号
     */
    protected $applyNo;

    /**
     * @return string
     */
    public function getRevokeApplyNo(): string
    {
        return $this->revokeApplyNo;
    }

    /**
     * @param string $revokeApplyNo
     */
    public function setRevokeApplyNo(string $revokeApplyNo): void
    {
        $this->revokeApplyNo = $revokeApplyNo;
    }

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'RevokeApplyNo' => $this->getRevokeApplyNo(),
            'AuthApplyNo' => $this->getApplyNo(),
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

    /**
     * @param string $applyNo
     */
    public function setApplyNo(string $applyNo): void
    {
        $this->applyNo = $applyNo;
    }
}