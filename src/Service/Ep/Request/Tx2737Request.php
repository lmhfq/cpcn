<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

use Lmh\Cpcn\Support\Xml;

class Tx2737Request extends BaseRequest
{
    protected $txCode = '2737';
    /**
     * @var string  修改申请流水号
     */
    protected $modifyApplyNo;
    /**
     * @var string 原进件申请流水号
     */
    protected $applyNo;
    /**
     * @var string 修改类型：
     * 01：设备添加、修改或者注销
     * 02：配置 appid、appPath
     */
    protected $modifyType = '02';
    /**
     * @var string 根据修改类型，上传需要修改的内容
     * 01 示例：{"deviceNo":"","operationType":"","status":"","devType": "", "serialNo": ""}
     * 02 示例：{ "appid":"", "authPath":""}
     */
    protected $modifyValue;

    /**
     * @return string
     */
    public function getModifyApplyNo(): string
    {
        return $this->modifyApplyNo;
    }

    /**
     * @param string $modifyApplyNo
     */
    public function setModifyApplyNo(string $modifyApplyNo): void
    {
        $this->modifyApplyNo = $modifyApplyNo;
    }

    /**
     * @return string
     */
    public function getModifyType(): string
    {
        return $this->modifyType;
    }

    /**
     * @param string $modifyType
     */
    public function setModifyType(string $modifyType): void
    {
        $this->modifyType = $modifyType;
    }

    /**
     * @return string
     */
    public function getModifyValue(): string
    {
        return $this->modifyValue;
    }

    /**
     * @param string $modifyValue
     */
    public function setModifyValue(string $modifyValue): void
    {
        $this->modifyValue = $modifyValue;
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


    public function handle()
    {
        $data = [];
        $head = parent::getHead();
        $head['Head']['InstitutionID'] = $this->getInstitutionId();
        $data = array_merge($data, $head);
        $body = [
            'ModifyApplyNo' => $this->getModifyApplyNo(),
            'ApplyNo' => $this->getApplyNo(),
            'ModifyType' => $this->getModifyType(),
            'ModifyValue' => $this->getModifyValue(),
        ];
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
    }

}