<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

abstract class TBaseNotify
{
    /**
     * @var string 交易流水号 流水号前17位必须是时间戳 yyyyMMddHHmmssSSS，数字
     */
    protected $txSn;
    /**
     * @var string 机构编号
     */
    protected $institutionId;
    /**
     * @var string 用户ID
     */
    protected $userId;
    /**
     * @var array
     */
    protected $noticeBody;

    /**
     * TBaseNotify constructor.
     * @param BaseNotify $baseNotify
     */
    public function __construct(BaseNotify $baseNotify)
    {
        $this->noticeBody = $baseNotify->getNoticeBody();
        $this->institutionId = ArrayUtil::get('InstitutionID', $this->noticeBody, []);
        $this->txSn = ArrayUtil::get('TxSN', $this->noticeBody, []);
        $this->userId = ArrayUtil::get('UserID', $this->noticeBody);
    }

    /**
     * @return string
     */
    public function getTxSn(): string
    {
        return $this->txSn;
    }

    /**
     * @param string $txSn
     */
    public function setTxSn(string $txSn): void
    {
        $this->txSn = $txSn;
    }

    /**
     * @return string
     */
    public function getInstitutionId(): string
    {
        return $this->institutionId;
    }

    /**
     * @param string $institutionId
     */
    public function setInstitutionId(string $institutionId): void
    {
        $this->institutionId = $institutionId;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }
}