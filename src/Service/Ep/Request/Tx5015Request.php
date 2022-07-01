<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:40
 */

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx5015Request extends BaseRequest
{
    protected $txCode = '5015';
    /**
     * @var string 短信验证码
     */
    protected $smsValidationCode;

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'SmsValidationCode' => $this->getSmsValidationCode(),
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
    public function getSmsValidationCode(): string
    {
        return $this->smsValidationCode;
    }

    /**
     * @param string $smsValidationCode
     */
    public function setSmsValidationCode(string $smsValidationCode): void
    {
        $this->smsValidationCode = $smsValidationCode;
    }
}