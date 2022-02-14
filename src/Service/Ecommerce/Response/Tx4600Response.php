<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/14
 * Time: 下午2:35
 */

namespace Lmh\Cpcn\Service\Ecommerce\Response;


class Tx4600Response extends BaseResponse
{
    public function handle(string $message)
    {
        $this->responseMessage = $message;
        parent::process();
    }
}