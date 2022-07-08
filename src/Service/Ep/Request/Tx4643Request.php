<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;


use Lmh\Cpcn\Support\Xml;

class Tx4643Request extends BaseRequest
{
    protected $txCode = '4643';
    /**
     * @var string 银行账户绑定流水号
     */
    protected $bindingTxSn;
    /**
     * @var int 交易金额
     * 单位：分
     */
    protected $amount;
    /**
     * @var int 到账类型
     * 10=T+1
     * 20=D0
     */
    protected $arrivalType = 10;
    /**
     * @var string 后台通知地址
     */
    protected $noticeUrl;
    /**
     * @var string
     */
    protected $branchName;
    /**
     * @var string
     */
    protected $province;
    /**
     * @var string
     */
    protected $city;
    /**
     * @var string 备注
     */
    protected $remark;

    /**
     * @return string
     */
    public function getBranchName(): ?string
    {
        return $this->branchName;
    }

    /**
     * @param string $branchName
     */
    public function setBranchName(string $branchName): void
    {
        $this->branchName = $branchName;
    }

    /**
     * @return string
     */
    public function getProvince(): ?string
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }


    public function handle()
    {
        $data = [];
        $data = array_merge($data, parent::getHead());
        $body = [
            'InstitutionID' => $this->getInstitutionId(),
            'TxSN' => $this->getTxSn(),
            'UserID' => $this->getUserId(),
            'BindingTxSN' => $this->getBindingTxSn(),
            'Amount' => $this->getAmount(),
            'ArrivalType' => $this->getArrivalType(),
            'NoticeURL' => $this->getNoticeUrl(),
            'Remark' => $this->getRemark(),
        ];
        if ($this->getProvince()) {
            $body['Province'] = $this->getProvince();
        }
        if ($this->getCity()) {
            $body['City'] = $this->getCity();
        }
        $data = array_merge($data, [
            'Body' => $body
        ]);
        $this->requestPlainText = Xml::build($data, 'Request', '', 'UTF-8');
        parent::handle();
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
     * @return int
     */
    public function getArrivalType(): int
    {
        return $this->arrivalType;
    }

    /**
     * @param int $arrivalType
     */
    public function setArrivalType(int $arrivalType): void
    {
        $this->arrivalType = $arrivalType;
    }

    /**
     * @return string
     */
    public function getNoticeUrl(): ?string
    {
        return $this->noticeUrl;
    }

    /**
     * @param string $noticeUrl
     */
    public function setNoticeUrl(string $noticeUrl): void
    {
        $this->noticeUrl = $noticeUrl;
    }

    /**
     * @return string
     */
    public function getRemark(): ?string
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
}