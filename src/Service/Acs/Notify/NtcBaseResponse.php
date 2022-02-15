<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:56
 */

namespace Lmh\Cpcn\Service\Acs\Notify;


class NtcBaseResponse
{
    /**
     * @var string
     */
    protected $plainText;
    /**
     * @var string
     */
    protected $message;
    /**
     * @var string
     */
    protected $msghd_rspcode = "000000";
    /**
     * @var string
     */
    protected $msghd_rspmsg = "交易成功";
    /**
     * @var string
     */
    protected $srl_ptnsrl;
    /**
     * @var string
     */
    protected $srl_platsrl;

    /**
     * @return string
     */
    public function getPlainText(): string
    {
        return $this->plainText;
    }

    /**
     * @param string $plainText
     */
    public function setPlainText(string $plainText): void
    {
        $this->plainText = $plainText;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMsghdRspcode(): string
    {
        return $this->msghd_rspcode;
    }

    /**
     * @param string $msghd_rspcode
     */
    public function setMsghdRspcode(string $msghd_rspcode): void
    {
        $this->msghd_rspcode = $msghd_rspcode;
    }

    /**
     * @return string
     */
    public function getMsghdRspmsg(): string
    {
        return $this->msghd_rspmsg;
    }

    /**
     * @param string $msghd_rspmsg
     */
    public function setMsghdRspmsg(string $msghd_rspmsg): void
    {
        $this->msghd_rspmsg = $msghd_rspmsg;
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


    /**
     * NtcBaseResponse constructor.
     * @param NtcBaseRequest $request
     */
    public function __construct(NtcBaseRequest $request)
    {
        $this->srl_platsrl = $request->getSrlPlatsrl();
    }

    protected function getMsghd()
    {
        return [
            "MSGHD" => [
                'RspCode' => $this->msghd_rspcode,
                'RspMsg' => $this->msghd_rspmsg
            ]
        ];
    }

    protected function getSrl(): array
    {
        return [
            "Srl" => [
                'PtnSrl' => $this->srl_ptnsrl,
                'PlatSrl' => $this->srl_platsrl,
            ]
        ];
    }

    /**
     * @param string $xml
     */
    protected function postProcess(string $xml)
    {
        $this->plainText = $xml;
        $this->message = base64_encode(trim($xml));
    }
}