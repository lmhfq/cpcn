<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午9:56
 */

namespace Lmh\Cpcn\Notify;


class NtcBaseResponse
{
    public $plainText;
    public $message;
    public $msghd_rspcode = "000000";
    public $msghd_rspmsg = "交易成功";
    public $srl_ptnsrl;
    public $srl_platsrl;


    public function __construct(NtcBaseRequest $request)
    {
        $this->srl_platsrl = $request->getSrlPlatsrl();
    }

    public function getMsghd()
    {
        return [
            "MSGHD" => [
                'RspCode' => $this->msghd_rspcode,
                'RspMsg' => $this->msghd_rspmsg
            ]
        ];
    }

    public function getSrl(): array
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
    public function postProcess(string $xml)
    {
        $this->plainText = $xml;
        $this->message = base64_encode(trim($xml));
    }
}