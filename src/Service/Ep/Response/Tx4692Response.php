<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Response;


use Lmh\Cpcn\Constant\TxResponseCode;
use Lmh\Cpcn\Entity\Tx\CapitalItemEntity;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4692Response extends BaseResponse
{
    /**
     * @var string
     */
    protected $userName;
    /**
     * @var integer 用户类型： 11=个人 12=企业 13 个体工商
     */
    protected $userType;
    /**
     * @var integer
     */
    public $totalCount;
    /**
     * @var integer
     */
    public $totalPage;
    /**
     * @var integer
     */
    public $currentPage;
    /**
     * @var array
     */
    public $items;

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        parent::handle($message);
        if ($this->code == TxResponseCode::SUCCESS) {
            $this->userName = ArrayUtil::get('UserName', $this->responseBody);
            $this->userType = intval(ArrayUtil::get('Balance', $this->responseBody));
            $this->totalCount = intval(ArrayUtil::get('TotalCount', $this->responseBody));
            $this->totalPage = intval(ArrayUtil::get('TotalPage', $this->responseBody));
            $this->currentPage = intval(ArrayUtil::get('CurrentPage', $this->responseBody));
            $items = ArrayUtil::get('Item', $this->responseBody, []);

            foreach ($items as $item) {
                $capitalItemEntity = new CapitalItemEntity();
                $capitalItemEntity->setTxSn(ArrayUtil::get('TxSn', $item));
                $capitalItemEntity->setTxType(intval(ArrayUtil::get('TxType', $item)));
                $capitalItemEntity->setTxTime(ArrayUtil::get('TxTime', $item));
                $capitalItemEntity->setOperation(ArrayUtil::get('Operation', $item));
                $capitalItemEntity->setAmount(intval(ArrayUtil::get('Amount', $item)));
                $capitalItemEntity->setReceivable(intval(ArrayUtil::get('Receivable', $item)));
                $capitalItemEntity->setFrozen(intval(ArrayUtil::get('Frozen', $item)));
                $capitalItemEntity->setBalance(intval(ArrayUtil::get('Balance', $item)));
                $capitalItemEntity->setRemark(ArrayUtil::get('Remark', $item));
                $this->items[] = $capitalItemEntity;
            }
        }
    }
}