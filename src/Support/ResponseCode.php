<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 下午2:29
 */

namespace Cpcn\Support;


class ResponseCode
{
    /**
     * 表示交易成功。同步交易，指业务办理成功；异步交易，指交易成功 但业务办理结果未知，
     */
    const SUCCESS = '000000';

}