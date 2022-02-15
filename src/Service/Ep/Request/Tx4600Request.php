<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:47
 */

namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Entity\Tx\ImageInfoEntity;
use Lmh\Cpcn\Support\Xml;

class Tx4600Request extends BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway4File/InterfaceII';

    protected $txCode = '4600';
    /**
     * @var int 业务类型：
     * 10-壹企付-开户上传身份影印图片（默认）
     * 11-壹企付-实名用户补充影印件
     * 20-薪享付-签约上传身份影印图片
     * 30-信用支付-准入授权影像件
     */
    protected $businessType = 10;
    /**
     * @var int 是否进行 OCR 标识：
     * 10-是
     * 20-否
     * 说明：BusinessType-业务类型为 10、11 时有效且只有分批单笔上传时支持上送 10，其它业务一律按 20-否处理OCRFlag 为 10 时，只支持上送单张图片
     */
    protected $oCRFlag = 20;
    /**
     * @var array
     * @see ImageInfoEntity
     */
    protected $imageInfo = [];

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
     * @return int
     */
    public function getOCRFlag(): int
    {
        return $this->oCRFlag;
    }

    /**
     * @param int $oCRFlag
     */
    public function setOCRFlag(int $oCRFlag): void
    {
        $this->oCRFlag = $oCRFlag;
    }

    /**
     * @return array
     */
    public function getImageInfo(): array
    {
        return $this->imageInfo;
    }

    /**
     * @param array $imageInfo
     */
    public function setImageInfo(array $imageInfo): void
    {
        $this->imageInfo = $imageInfo;
    }

    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'UserID' => $this->getUserId(),
            'TxSN' => $this->getTxSn(),
            'BusinessType' => $this->getBusinessType(),
            'OCRFlag' => $this->getOCRFlag(),
        ];
        $imageInfo = [];
        foreach ($this->imageInfo as $v) {
            /**
             * @var $v ImageInfoEntity
             */
            $imageInfo[] = [
                'ItemNo' => $v->getItemNo(),
                'ImageType' => $v->getImageType(),
                'ImageContent' => $v->getImageContent(),
            ];
        }
        $body = array_merge($body, $imageInfo);
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', 'ImageInfo', 'UTF-8');
        parent::handle();
    }
}