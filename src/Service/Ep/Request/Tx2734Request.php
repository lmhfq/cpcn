<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Entity\Tx\AttachInfoEntity;
use Lmh\Cpcn\Support\Xml;

class Tx2734Request extends BaseRequest
{
    protected $txCode = '2734';
    /**
     * @var string 申请流水号
     */
    protected $applyNo;
    /**
     * @var string 银行账户绑定流水号
     */
    protected $bindingTxSn;
    /**
     * @var string 支付方式
     * 10=微信
     * 20=支付宝
     * 40=银联
     * 50=数字人民币
     */
    protected $payWay = 10;
    /**
     * @var string 行业类别
     * 支付方式为微信，且为个人小微商户进件时，行业类别可参考个体工商户
     */
    protected $category;
    /**
     * @var string 客服电话
     */
    protected $servicePhone;
    /**
     * @var string 平台名称
     * 展示在持卡人收银台上的平台名称，可选择填写
     * 增加一下描述，若不填写，默认企业用户 xxx，
     * 个体户 xxx
     */
    protected $platformName;
    /**
     * @var string 省份
     */
    protected $provinceCode;
    /**
     * @var string 城市
     */
    protected $cityCode;
    /**
     * @var string 区县
     */
    protected $districtCode;
    /**
     * @var array
     */
    protected $attachInfoList = [];

    /**
     * @return string
     */
    public function getProvinceCode(): ?string
    {
        return $this->provinceCode;
    }

    /**
     * @param string $provinceCode
     */
    public function setProvinceCode(string $provinceCode): void
    {
        $this->provinceCode = $provinceCode;
    }

    /**
     * @return string
     */
    public function getCityCode(): ?string
    {
        return $this->cityCode;
    }

    /**
     * @param string $cityCode
     */
    public function setCityCode(string $cityCode): void
    {
        $this->cityCode = $cityCode;
    }

    /**
     * @return string
     */
    public function getDistrictCode(): ?string
    {
        return $this->districtCode;
    }

    /**
     * @param string $districtCode
     */
    public function setDistrictCode(string $districtCode): void
    {
        $this->districtCode = $districtCode;
    }

    /**
     * @return array
     */
    public function getAttachInfoList(): array
    {
        return $this->attachInfoList;
    }

    /**
     * @param array $attachInfoList
     */
    public function setAttachInfoList(array $attachInfoList): void
    {
        $this->attachInfoList = $attachInfoList;
    }

    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ApplyNo' => $this->getApplyNo(),
            'UserID' => $this->getUserId(),
            'BindingTxSN' => $this->getBindingTxSn(),
            'PayWay' => $this->getPayWay(),
            'Category' => $this->getCategory(),
        ];
        if ($this->getServicePhone()) {
            $body['ServicePhone'] = $this->getServicePhone();
        }
        if ($this->getPlatformName()) {
            $body['PlatformName'] = $this->getPlatformName();
        }
        $attachInfoList = [];
        foreach ($this->attachInfoList as $v) {
            /**
             * @var $v AttachInfoEntity
             */
            $attachInfoList[] = [
                'AttachInfo' => [
                    'PayType' => $v->getPayType(),
                    'AppID' => $v->getAppId(),
                    'AuthPath' => $v->getAuthPath(),
                ]
            ];
        }
        $body = array_merge($body, $attachInfoList);
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', 'AttachInfoList', 'UTF-8');
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

    /**
     * @return string
     */
    public function getBindingTxSn(): ?string
    {
        return $this->bindingTxSn;
    }

    /**
     * @param string $bindingTxSn
     */
    public function setBindingTxSn(string $bindingTxSn): void
    {
        $this->bindingTxSn = $bindingTxSn;
    }

    /**
     * @return string
     */
    public function getPayWay()
    {
        return $this->payWay;
    }

    /**
     * @param string $payWay
     */
    public function setPayWay(string $payWay): void
    {
        $this->payWay = $payWay;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }


    /**
     * @return string
     */
    public function getServicePhone(): ?string
    {
        return $this->servicePhone;
    }

    /**
     * @param string $servicePhone
     */
    public function setServicePhone(string $servicePhone): void
    {
        $this->servicePhone = $servicePhone;
    }

    /**
     * @return string
     */
    public function getPlatformName(): ?string
    {
        return $this->platformName;
    }

    /**
     * @param string $platformName
     */
    public function setPlatformName(string $platformName): void
    {
        $this->platformName = $platformName;
    }
}