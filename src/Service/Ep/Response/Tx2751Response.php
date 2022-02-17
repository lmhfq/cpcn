<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/15
 * Time: 上午10:41
 */

namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx2751Response extends BaseResponse
{
    /**
     * @var int 卡介质类型：
     * 10=借记卡
     * 20=贷记卡
     */
    protected $cardMediaType;
    /**
     * @var int 银行 ID
     */
    protected $bankId;
    /**
     * @var string 银行名称
     */
    protected $bankName;

    /**
     * @return int
     */
    public function getCardMediaType(): int
    {
        return $this->cardMediaType;
    }

    /**
     * @param int $cardMediaType
     */
    public function setCardMediaType(int $cardMediaType): void
    {
        $this->cardMediaType = $cardMediaType;
    }

    /**
     * @return int
     */
    public function getBankId(): int
    {
        return intval($this->bankId);
    }

    /**
     * @param int $bankId
     */
    public function setBankId(int $bankId): void
    {
        $this->bankId = $bankId;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName ?: '';
    }

    /**
     * @param string $bankName
     */
    public function setBankName(string $bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->cardMediaType = ArrayUtil::get('CardMediaType', $this->responseBody);
            $this->bankId = ArrayUtil::get('BankID', $this->responseBody);
            $this->bankName = ArrayUtil::get('BankName', $this->responseBody);
        }
    }
}