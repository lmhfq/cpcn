<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Entity\Tx;


class FileInfoEntity
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
    protected $fileType;
    /**
     * @var string 文件名称；
     */
    protected $fileName;
    /**
     * @var string
     * 影印件,图片 JPG 格式，大小不超过
     * 100KB，图片二进制数据转
     * BASE64 编码
     */
    protected $fileContent;
    /**
     * @var string
     */
    protected $fileId;

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
    public function getFileType(): int
    {
        return $this->fileType;
    }

    /**
     * @param int $fileType
     */
    public function setFileType(int $fileType): void
    {
        $this->fileType = $fileType;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileContent(): string
    {
        return $this->fileContent;
    }

    /**
     * @param string $fileContent
     */
    public function setFileContent(string $fileContent): void
    {
        $this->fileContent = $fileContent;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     */
    public function setFileId(string $fileId): void
    {
        $this->fileId = $fileId;
    }
}