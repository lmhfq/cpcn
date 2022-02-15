<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:18
 */

namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4664Request extends BaseRequest
{
    protected $txCode = '4664';
    /**
     * @var int 操作类型：
     * 10=冻结
     * 20=解冻
     * 30=解冻-分账并冻结
     */
    protected $operationType;

    /**
     * @return int
     */
    public function getOperationType(): int
    {
        return $this->operationType;
    }

    /**
     * @param int $operationType
     */
    public function setOperationType(int $operationType): void
    {
        $this->operationType = $operationType;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'OperationType' => $this->getOperationType(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}