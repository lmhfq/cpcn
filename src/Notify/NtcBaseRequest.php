<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午8:47
 */

namespace Lmh\Cpcn\Notify;


use InvalidArgumentException;
use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\SignatureFactory;
use Lmh\Cpcn\Support\Xml;

class NtcBaseRequest
{
    protected $message;

    protected $noticeData;

    protected $plainText;
    /**
     * @var string 合作方编号
     */
    protected $msghd_ptncd;
    /**
     * @var string 交易码
     */
    protected $msghd_trcd;
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
     * @var string 平台交易流水号
     */
    protected $srl_platsrl;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getPlainText()
    {
        return $this->plainText;
    }

    /**
     * @param mixed $plainText
     */
    public function setPlainText($plainText): void
    {
        $this->plainText = $plainText;
    }

    /**
     * @return string
     */
    public function getMsghdPtncd(): string
    {
        return $this->msghd_ptncd;
    }

    /**
     * @param string $msghd_ptncd
     */
    public function setMsghdPtncd(string $msghd_ptncd): void
    {
        $this->msghd_ptncd = $msghd_ptncd;
    }

    /**
     * @return string
     */
    public function getMsghdTrcd(): string
    {
        return $this->msghd_trcd;
    }

    /**
     * @param string $msghd_trcd
     */
    public function setMsghdTrcd(string $msghd_trcd): void
    {
        $this->msghd_trcd = $msghd_trcd;
    }

    /**
     * @return string
     */
    public function getMsghdTrdt(): string
    {
        return $this->msghd_trdt;
    }

    /**
     * @param string $msghd_trdt
     */
    public function setMsghdTrdt(string $msghd_trdt): void
    {
        $this->msghd_trdt = $msghd_trdt;
    }

    /**
     * @return string
     */
    public function getMsghdTrtm(): string
    {
        return $this->msghd_trtm;
    }

    /**
     * @param string $msghd_trtm
     */
    public function setMsghdTrtm(string $msghd_trtm): void
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
     * @param string $msghd_trsrc
     */
    public function setMsghdTrsrc(string $msghd_trsrc): void
    {
        $this->msghd_trsrc = $msghd_trsrc;
    }

    /**
     * @return string
     */
    public function getMsghdBkcd(): string
    {
        return $this->msghd_bkcd;
    }

    /**
     * @param string $msghd_bkcd
     */
    public function setMsghdBkcd(string $msghd_bkcd): void
    {
        $this->msghd_bkcd = $msghd_bkcd;
    }

    /**
     * @return string
     */
    public function getSrlPtnsrl(): string
    {
        return $this->srl_ptnsrl;
    }

    /**
     * @param string $srl_ptnsrl
     */
    public function setSrlPtnsrl(string $srl_ptnsrl): void
    {
        $this->srl_ptnsrl = $srl_ptnsrl;
    }

    /**
     * @return string
     */
    public function getSrlPlatsrl(): string
    {
        return $this->srl_platsrl;
    }

    /**
     * @param string $srl_platsrl
     */
    public function setSrlPlatsrl(string $srl_platsrl): void
    {
        $this->srl_platsrl = $srl_platsrl;
    }

    public abstract function handle(string $message, string $signature);

    public function process(string $message, string $signature)
    {
        $this->message = $message;
        $this->plainText = trim(base64_decode($message));
        $result = SignatureFactory::getSigner()->verify($this->plainText, $signature);
        if ($result != 1) {
            throw new InvalidArgumentException("MK2001", "验证签名失败。");
        }
        $this->plainText = str_replace('encoding="GBK"', 'encoding="UTF-8"', $this->plainText);
        $this->noticeData = Xml::parse($this->plainText);

        $msgHd = ArrayUtil::get('MSGHD', $this->noticeData, []);
        $srl = ArrayUtil::get('Srl', $this->noticeData, []);

        $this->msghd_trcd = ArrayUtil::get('TrCd', $msgHd, '');
        $this->msghd_trdt = ArrayUtil::get('TrDt', $msgHd, '');
        $this->msghd_trtm = ArrayUtil::get('TrTm', $msgHd, '');
        $this->msghd_trsrc = ArrayUtil::get('TrSrc', $msgHd, '');
        $this->msghd_ptncd = ArrayUtil::get('PtnCd', $msgHd, '');
        $this->msghd_bkcd = ArrayUtil::get('BkCd', $msgHd, '');

        $this->srl_ptnsrl = ArrayUtil::get('SrcPtnSrl', $srl, '');
        $this->srl_platsrl = ArrayUtil::get('PlatSrl', $srl, '');
    }
}