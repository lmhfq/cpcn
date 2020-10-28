<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


class ResponseCode
{
    /**
     * 表示交易成功。同步交易，指业务办理成功；异步交易，指交易成功 但业务办理结果未知，
     */
    const SUCCESS = '000000';

}