<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4698Response extends BaseResponse
{
    /**
     * @var int 交易状态；10=成功 20=失败
     */
    protected $status;
    /**
     * @var string 下载地址
     */
    protected $downLoadUrl;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDownLoadUrl(): string
    {
        return $this->downLoadUrl;
    }

    /**
     * @param string $downLoadUrl
     */
    public function setDownLoadUrl(string $downLoadUrl): void
    {
        $this->downLoadUrl = $downLoadUrl;
    }


    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->status = intval(ArrayUtil::get('Status', $this->responseBody));
            $this->downLoadUrl = ArrayUtil::get('DownLoadURL', $this->responseBody);
        }
    }
}