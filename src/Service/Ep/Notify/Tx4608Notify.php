<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Notify;


use Lmh\Cpcn\Support\ArrayUtil;

class Tx4608Notify extends TBaseNotify
{
    /**
     * @var array 用户权限开通 明细，出现 0-n次
     */
    protected $item = [];

    /**
     * @return array
     */
    public function getItem(): array
    {
        return $this->item;
    }

    /**
     * @param array $item
     */
    public function setItem(array $item): void
    {
        $this->item = $item;
    }

    public function __construct(BaseNotify $baseNotify)
    {
        parent::__construct($baseNotify);
        $this->item = ArrayUtil::get('Item', $this->noticeBody, []);
    }

}