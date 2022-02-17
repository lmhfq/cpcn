<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午4:21
 */

namespace Lmh\Cpcn\Entity\Tx;


class ImageInfoEntity
{
    /**
     * @var string 明细流水号
     * 只能为数字字母 开头和结尾, 中间可以包含 -,流水号前 17 位必须是时间戳（ yyyyMMddHHmmssSSS，数字）
     */
    protected $itemNo;
    /**
     * @var int
     * 影印件类别：
     * 10=身份证人像面
     * 11=身份证国徽面
     * 12=活体照片
     * 20=统一社会信用代码证
     * 21=基本户开户证明
     * 30=个体工商营业执照
     * 业务类型为 30 时，需上传 10、11、12、20 或 30；
     */
    protected $imageType;
    /**
     * @var string
     * 影印件,图片 JPG 格式，大小不超过
     * 100KB，图片二进制数据转
     * BASE64 编码
     */
    protected $imageContent;

    /**
     * @return string
     */
    public function getItemNo(): string
    {
        return $this->itemNo;
    }

    /**
     * @param string $itemNo
     */
    public function setItemNo(string $itemNo): void
    {
        $this->itemNo = $itemNo;
    }

    /**
     * @return int
     */
    public function getImageType(): int
    {
        return $this->imageType;
    }

    /**
     * @param int $imageType
     */
    public function setImageType(int $imageType): void
    {
        $this->imageType = $imageType;
    }

    /**
     * @return string
     */
    public function getImageContent(): string
    {
        return $this->imageContent;
    }

    /**
     * @param string $imageContent
     */
    public function setImageContent(string $imageContent): void
    {
        $this->imageContent = $imageContent;
    }
}