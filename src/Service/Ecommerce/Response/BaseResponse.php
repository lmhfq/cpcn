<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:13
 */

namespace Lmh\Cpcn\Service\Ecommerce\Response;

use Lmh\Cpcn\Support\ArrayTrait;

class BaseResponse
{
    use ArrayTrait;

    /**
     * @var array
     */
    protected $responseData = [];
    /**
     * @var string
     */
    protected $responsePlainText;

    /**
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }

    /**
     * @return string
     */
    public function getResponsePlainText(): string
    {
        return $this->responsePlainText;
    }
}