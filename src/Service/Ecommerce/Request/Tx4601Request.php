<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午4:38
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

use Lmh\Cpcn\Constant\UserType;
use Lmh\Cpcn\Exception\InvalidConfigException;
use Lmh\Cpcn\Support\Xml;

class Tx4601Request extends BaseRequest
{

    protected $txCode = '4601';
    /**
     * @var int 用户类型：
     * 11=个人
     * 12=企业
     * 13=个体户
     */
    protected $userType;
    /**
     * @var string 归属父级用户 ID
     */
    protected $parentUserId;
    /**
     * @var string 确权方式
     * 第一位=数字证书
     * 第二位=短信验证
     * 第三位=邮件验证
     * 第四位=支付密码
     * 第五位=指纹
     * 第六位=人脸识别
     * 第七位=电子签名
     * 第八位=默认自动支付
     * 第九位=签约自动支付
     * 说明：1 表示该确权信息上送，0 表示该确权信息未上送
     * 如 1011111，表示数字证书、短信验证、邮件验证、支付密码、指纹、电子签名五种确权信息，而人脸识别、默认自动支付、签约自动支付不是上送确权信息
     * 中金账户必填
     */
    protected $acceptanceConfirmType = '';
    /**
     * @var int 账户层级
     * 中金账户必填，层级分为 1-10 级
     */
    protected $accountLevel = 1;
    /**
     * @var string 影印件采集交易流水号
     * 中金账户必填、电子账户模式众邦银行企业用户必填，4600 接口中的 TxSN；
     */
    protected $imageCollectionTxSN;
    /**
     * @var int 业务类型
     * 10=开户 20=开户并绑卡
     */
    protected $businessType = 20;
    /**
     * @var array 个人开户选择域
     */
    protected $individual = [];
    /**
     * @var array 企业开户选择域
     */
    protected $corporation = [];
    /**
     * @var array  个体户开户域
     */
    protected $retailer = [];
    /**
     * @var array 绑定银行账户域
     * 业务类型：20=开户并绑卡时必填
     */
    protected $bankAccount = [];


    /**
     * @return int
     */
    public function getUserType(): int
    {
        return $this->userType;
    }

    /**
     * @param int $userType
     */
    public function setUserType(int $userType): void
    {
        $this->userType = $userType;
    }

    /**
     * @return string
     */
    public function getParentUserId(): string
    {
        return $this->parentUserId;
    }

    /**
     * @param string $parentUserId
     */
    public function setParentUserId(string $parentUserId): void
    {
        $this->parentUserId = $parentUserId;
    }

    /**
     * @return string
     */
    public function getAcceptanceConfirmType(): string
    {
        return $this->acceptanceConfirmType;
    }

    /**
     * @param string $acceptanceConfirmType
     */
    public function setAcceptanceConfirmType(string $acceptanceConfirmType): void
    {
        $this->acceptanceConfirmType = $acceptanceConfirmType;
    }


    /**
     * @return int
     */
    public function getAccountLevel(): int
    {
        return $this->accountLevel;
    }

    /**
     * @param int $accountLevel
     */
    public function setAccountLevel(int $accountLevel): void
    {
        $this->accountLevel = $accountLevel;
    }

    /**
     * @return string
     */
    public function getImageCollectionTxSN(): string
    {
        return $this->imageCollectionTxSN;
    }

    /**
     * @param string $imageCollectionTxSN
     */
    public function setImageCollectionTxSN(string $imageCollectionTxSN): void
    {
        $this->imageCollectionTxSN = $imageCollectionTxSN;
    }

    /**
     * @return int
     */
    public function getBusinessType(): int
    {
        return $this->businessType;
    }

    /**
     * @param int $businessType
     */
    public function setBusinessType(int $businessType): void
    {
        $this->businessType = $businessType;
    }

    /**
     * @return array
     */
    public function getIndividual(): array
    {
        return $this->individual;
    }

    /**
     * @param array $individual
     */
    public function setIndividual(array $individual): void
    {
        $this->individual = $individual;
    }

    /**
     * @return array
     */
    public function getCorporation(): array
    {
        return $this->corporation;
    }

    /**
     * @param array $corporation
     */
    public function setCorporation(array $corporation): void
    {
        $this->corporation = $corporation;
    }

    /**
     * @return array
     */
    public function getRetailer(): array
    {
        return $this->retailer;
    }

    /**
     * @param array $retailer
     */
    public function setRetailer(array $retailer): void
    {
        $this->retailer = $retailer;
    }

    /**
     * @return array
     */
    public function getBankAccount(): array
    {
        return $this->bankAccount;
    }

    /**
     * @param array $bankAccount
     */
    public function setBankAccount(array $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

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
            'TxSN' => $this->getTxSn(),
            'UserID' => $this->getUserId(),
            'UserType' => $this->getUserType(),
            'AcceptanceConfirmType' => $this->getAcceptanceConfirmType(),
            'AccountLevel' => $this->getAccountLevel(),
        ];
        $body['BusinessType'] = $this->getBusinessType();
        switch ($this->userType) {
            case UserType::INDIVIDUAL:
                $body['Individual'] = $this->getIndividual();
                break;
            case UserType::CORPORATION:
                $body['ImageCollectionTxSN'] = $this->getImageCollectionTxSN();
                $body['Corporation'] = $this->getCorporation();
                break;
            case UserType::RETAILER:
                $body['Retailer'] = $this->getRetailer();
                break;
        }
        $body['BankAccount'] = $this->getBankAccount();
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::process();
    }
}