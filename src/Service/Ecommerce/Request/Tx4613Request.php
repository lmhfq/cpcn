<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午6:13
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4613Request extends BaseRequest
{
    protected $txCode = '4613';
    /**
     * @var int 验证方式：
     * 10=短信验证
     * 20=小额打款验证
     */
    protected $verifyWay;
    /**
     * @var string 短信验证码
     */
    protected $smsCode;
    /**
     * @var int 打款金额
     * 单位：分，验证方式：20 时必填；100 分（1 元）以内随机金额
     */
    protected $amount;

    /**
     * @return int
     */
    public function getVerifyWay(): int
    {
        return $this->verifyWay;
    }

    /**
     * @param int $verifyWay
     */
    public function setVerifyWay(int $verifyWay): void
    {
        $this->verifyWay = $verifyWay;
    }

    /**
     * @return string
     */
    public function getSmsCode(): string
    {
        return $this->smsCode;
    }

    /**
     * @param string $smsCode
     */
    public function setSmsCode(string $smsCode): void
    {
        $this->smsCode = $smsCode;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'VerifyWay' => $this->getVerifyWay(),
        ];
        if ($this->verifyWay == 10) {
            $body['SMSCode'] = $this->getSmsCode();
        } else {
            $body['Amount'] = $this->getAmount();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }
}