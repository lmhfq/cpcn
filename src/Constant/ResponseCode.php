<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Constant;


class ResponseCode
{
    /**
     * 表示交易成功。同步交易，指业务办理成功；异步交易，指交易成功 但业务办理结果未知，
     */
    public const SUCCESS = '000000';

    /**
     * 则表示开户处理中，需要通过 T1002 查询开户结果
     */
    public const E3010 = 'E3010';

}