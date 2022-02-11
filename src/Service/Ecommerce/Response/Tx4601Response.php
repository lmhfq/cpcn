<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/11
 * Time: 下午5:29
 */

namespace Lmh\Cpcn\Service\Ecommerce\Response;


use Lmh\Cpcn\Constant\Code;
use Lmh\Cpcn\Support\ArrayUtil;

class Tx4601Response extends BaseResponse
{

    /**
     * @var string 机构编号
     */
    protected $institutionId;
    protected $responseCode;
    protected $responseMessage;
    protected $userId;
    protected $status;
    /**
     * @var string
     */
    protected $dBank_eAccountName;
    /**
     * @var string
     */
    protected $dBank_eAccountNumber;
    /**
     * @var int 绑卡状态:
     * 10=已受理
     * 20=处理中
     * 30=成功
     * 40=失败
     */
    protected $bindingStatus;

    /**
     * @param string $message
     * @author lmh
     */
    public function handle(string $message)
    {
        $this->responseMessage = $message;
        parent::process();
        if ($this->code == Code::SUCCESS) {
            $this->userId = ArrayUtil::get('UserID', $this->responseBody);
            $this->status = ArrayUtil::get('Status', $this->responseBody);
        }
    }
}