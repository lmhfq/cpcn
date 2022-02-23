<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 下午8:08
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4641Response extends BaseResponse
{
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var int
     */
    protected $status;
    /**
     * @var string
     */
    protected $responseTime;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return intval($this->amount);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getResponseTime(): string
    {
        return $this->responseTime;
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
            $this->amount = ArrayUtil::get('Amount', $this->responseBody);
            $this->responseTime = ArrayUtil::get('ResponseTime', $this->responseBody);
        }
    }
}