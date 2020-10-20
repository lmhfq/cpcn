<?php
declare(strict_types=1);

namespace Cpcn\Request;


use Cpcn\Support\SignatureFactory;

/**
 * Class TrdBaseRequest
 * @package Cpcn\Request
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 */
abstract class TrdBaseRequest extends BaseRequest
{
    protected $sign = false;
    /**
     * @var string 交易日期
     */
    protected $msghd_trdt;
    /**
     * @var string 交易时间
     */
    protected $msghd_trtm;
    /**
     * @var string 交易发起方
     */
    protected $msghd_trsrc = "F";
    /**
     * @var string 托管方编号
     */
    protected $msghd_bkcd;
    /**
     * @var string 合作方交易流水号
     */
    protected $srl_ptnsrl;

    /**
     * @return mixed
     */
    public function getMsghdTrdt()
    {
        return $this->msghd_trdt;
    }

    /**
     * @param mixed $msghd_trdt
     */
    public function setMsghdTrdt($msghd_trdt)
    {
        $this->msghd_trdt = $msghd_trdt;
    }

    /**
     * @return mixed
     */
    public function getMsghdTrtm()
    {
        return $this->msghd_trtm;
    }

    /**
     * @param mixed $msghd_trtm
     */
    public function setMsghdTrtm($msghd_trtm)
    {
        $this->msghd_trtm = $msghd_trtm;
    }

    /**
     * @return string
     */
    public function getMsghdTrsrc(): string
    {
        return $this->msghd_trsrc;
    }

    /**
     * @return mixed
     */
    public function getMsghdBkcd()
    {
        return $this->msghd_bkcd;
    }

    /**
     * @param mixed $msghd_bkcd
     */
    public function setMsghdBkcd($msghd_bkcd)
    {
        $this->msghd_bkcd = $msghd_bkcd;
    }

    /**
     * @return mixed
     */
    public function getSrlPtnsrl()
    {
        return $this->srl_ptnsrl;
    }

    /**
     * @param mixed $srl_ptnsrl
     */
    public function setSrlPtnsrl($srl_ptnsrl)
    {
        $this->srl_ptnsrl = $srl_ptnsrl;
    }


    public abstract function toXml();

    protected function handle(string $xml)
    {
        $this->requestPlainText = $xml;
        $this->requestPlainText = mb_convert_encoding($this->requestPlainText, "UTF-8", "GBK");

        $this->requestMessage = base64_encode(trim($this->requestPlainText));
        $this->requestSignature = SignatureFactory::getSigner()->sign(trim($this->requestPlainText));
        $this->sign = true;
    }

    /**
     * @return array[]
     */
    public function getMsghd(): array
    {
        if (empty($this->getMsghdTrdt())) {
            $this->setMsghdTrdt(date('Ymd'));
        }
        if (empty($this->getMsghdTrtm())) {
            $this->setMsghdTrtm(date('His'));
        }
        return [
            "MSGHD" => [
                'TrCd' => $this->getMsghdTrcd(),
                'TrSrc' => $this->getMsghdTrsrc(),
                'TrDt' => $this->getMsghdTrdt(),
                'TrTm' => $this->getMsghdTrtm(),
                'PtnCd' => $this->getMsghdPtncd(),
                'BkCd' => $this->getMsghdBkcd(),
            ]
        ];
    }

    /**
     * @return array
     */
    public function getSrl(): array
    {
        return [
            "Srl" => [
                'PtnSrl' => $this->srl_ptnsrl,
            ]
        ];
    }
}