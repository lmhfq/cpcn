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
     * @var string 确权方式
     */
    protected $acceptanceConfirmType = '';
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
     * @var string 备注
     */
    protected $remark;

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