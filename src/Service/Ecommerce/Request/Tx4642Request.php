<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 下午9:23
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4642Request  extends BaseRequest
{
    protected $txCode = '4642';
    /**
     * @var string 短信验证码
     */
    protected $smsValidationCode;

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

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'SMSValidationCode' => $this->getSmsValidationCode(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}