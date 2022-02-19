<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/19
 * Time: 上午9:36
 */

namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx7709Notify extends TBaseNotify
{
    /**
     * @var string 申请流水号
     */
    protected $applyNo;
    /**
     * @var string 通过时间
     */
    protected $signTime;
    /**
     * @var string 签约手机号
     */
    protected $phoneNumber;
    /**
     * @var int 状态：
     * 20=签约成功
     */
    protected $status;

    /**
     * @return string
     */
    public function getApplyNo()
    {
        return $this->applyNo;
    }

    /**
     * @return string
     */
    public function getSignTime(): string
    {
        return $this->signTime ?: '';
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber ?: '';
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }


    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->status = intval(ArrayUtil::get('Status', $this->noticeBody));
        $this->signTime = ArrayUtil::get('SignTime', $this->noticeBody, []);
        $this->phoneNumber = ArrayUtil::get('PhoneNumber', $this->noticeBody, []);
        $this->applyNo = ArrayUtil::get('ApplyNo', $this->noticeBody, []);
    }
}