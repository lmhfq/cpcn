<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4695Response extends BaseResponse
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

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $items = ArrayUtil::get('Item', $this->responseBody, []);
            foreach ($items as $v) {
                $this->item[$v['AuthType']] = $v;
            }
        }
    }
}