<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/17
 * Time: 上午9:58
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx4618Notify extends TBaseNotify
{
    /**
     * @var string
     */
    protected $sourceTxCode;
    /**
     * @var string
     */
    protected $sourceTxSn;
    /**
     * @var int
     */
    protected $userType;
    /**
     * @var string
     */
    protected $parentUserId;
    /**
     * @var int
     */
    protected $status;
    /**
     * @var string 驳回的影印件类型，以";"英文分号分隔
     */
    protected $rejectImageType;

    /**
     * @return string
     */
    public function getSourceTxCode(): string
    {
        return $this->sourceTxCode;
    }

    /**
     * @return string
     */
    public function getSourceTxSn(): string
    {
        return $this->sourceTxSn;
    }

    /**
     * @return int
     */
    public function getUserType(): int
    {
        return $this->userType;
    }

    /**
     * @return string
     */
    public function getParentUserId(): string
    {
        return $this->parentUserId;
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
    public function getRejectImageType(): string
    {
        return $this->rejectImageType;
    }

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = ArrayUtil::get('Status', $this->noticeBody, []);
    }
}