<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午4:40
 */

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
     * @var int
     */
    protected $category;
    /**
     * @var array
     */
    protected $attachInfoList = [];

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
    public function getBindingTxSn(): string
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
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
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
}