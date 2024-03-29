<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;


use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\Exception\ResultErrorException;
use Lmh\Cpcn\Support\ArrayTrait;
use Lmh\Cpcn\Support\ArrayUtil;
use Lmh\Cpcn\Support\Xml;

abstract class TrdBaseResponse
{
    use ArrayTrait;

    /**
     * @var array 响应信息
     */
    protected $responseData = [];
    /**
     * @var string 响应报文
     */
    protected $responsePlainText;
    /**
     * @var string
     */
    protected $responseMessage;
    /**
     * @var string 返回码
     */
    protected $msghd_rspcode;
    /**
     * @var string 返回信息
     */
    protected $msghd_rspmsg;
    /**
     * @var string 合作方交易流水号
     */
    protected $srl_ptnsrl;
    /**
     * @var string 平台交易流水号
     */
    protected $srl_platsrl;

    /**
     * @return string
     */
    public function getResponsePlainText(): string
    {
        return $this->responsePlainText;
    }

    /**
     * @param string $responsePlainText
     */
    public function setResponsePlainText(string $responsePlainText): void
    {
        $this->responsePlainText = $responsePlainText;
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


    public abstract function handle(string $message);

    /**
     *
     * @param string $message
     */
    protected function process(string $message)
    {
        $this->responseMessage = $message;
        $this->responsePlainText = trim(base64_decode($message));
        $this->responseData = Xml::parse(str_replace('encoding="GBK"', 'encoding="UTF-8"', $this->responsePlainText));
        $msgHd = ArrayUtil::get('MSGHD', $this->responseData, []);
        $srl = ArrayUtil::get('Srl', $this->responseData, []);

        $this->msghd_rspcode = ArrayUtil::get('RspCode', $msgHd, '');
        $this->msghd_rspmsg = ArrayUtil::get('RspMsg', $msgHd, '');

        $this->srl_ptnsrl = ArrayUtil::get('PtnSrl', $srl, '');
        $this->srl_platsrl = ArrayUtil::get('PlatSrl', $srl, '');
    }

    /**
     * @param TrdBaseResponse $response
     * @return void
     * @throws ResultErrorException
     */
    public function checkResult(TrdBaseResponse $response)
    {
        if ($response->getMsghdRspcode() != ResponseCode::SUCCESS && $response->getMsghdRspcode() != ResponseCode::PYSUCC) {
            throw new ResultErrorException($response->getMsghdRspmsg(), $response->getMsghdRspcode());
        }
    }

}