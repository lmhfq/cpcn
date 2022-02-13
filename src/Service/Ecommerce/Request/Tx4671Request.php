<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午2:18
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4671Request extends BaseRequest
{
    protected $txCode = '4671';
    /**
     * @var string 付款用户编号
     */
    protected $payerUserId;
    /**
     * @var string 付款用户名称
     */
    protected $payerUserName;
    /**
     * @var string 收款机构编号
     */
    protected $payeeInstitutionId;
    /**
     * @var string 收款用户编号
     */
    protected $payeeUserId;
    /**
     * @var string 收款用户名称
     */
    protected $payeeUserName;
    /**
     * @var int 交易金额
     * 单位：分
     */
    protected $amount;
    /**
     * @var string 备注
     * 单位：分
     */
    protected $remark = '';

    /**
     * @return string
     */
    public function getPayerUserId(): string
    {
        return $this->payerUserId;
    }

    /**
     * @param string $payerUserId
     */
    public function setPayerUserId(string $payerUserId): void
    {
        $this->payerUserId = $payerUserId;
    }

    /**
     * @return string
     */
    public function getPayerUserName(): string
    {
        return $this->payerUserName;
    }

    /**
     * @param string $payerUserName
     */
    public function setPayerUserName(string $payerUserName): void
    {
        $this->payerUserName = $payerUserName;
    }

    /**
     * @return string
     */
    public function getPayeeInstitutionId(): string
    {
        return $this->payeeInstitutionId;
    }

    /**
     * @param string $payeeInstitutionId
     */
    public function setPayeeInstitutionId(string $payeeInstitutionId): void
    {
        $this->payeeInstitutionId = $payeeInstitutionId;
    }

    /**
     * @return string
     */
    public function getPayeeUserId(): string
    {
        return $this->payeeUserId;
    }

    /**
     * @param string $payeeUserId
     */
    public function setPayeeUserId(string $payeeUserId): void
    {
        $this->payeeUserId = $payeeUserId;
    }

    /**
     * @return string
     */
    public function getPayeeUserName(): string
    {
        return $this->payeeUserName;
    }

    /**
     * @param string $payeeUserName
     */
    public function setPayeeUserName(string $payeeUserName): void
    {
        $this->payeeUserName = $payeeUserName;
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

    /**
     * @return string
     */
    public function getRemark(): string
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     */
    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'PayerUserID' => $this->getPayerUserId(),
            'PayerUserName' => $this->getPayerUserName(),
            'PayeeInstitutionID' => $this->getPayeeInstitutionId(),
            'PayeeUserID' => $this->getPayeeUserId(),
            'PayeeUserName' => $this->getPayeeUserName(),
            'Amount' => $this->getAmount(),
            'Remark' => $this->getRemark(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
    }
}