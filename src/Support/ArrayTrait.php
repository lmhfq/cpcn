<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2021/2/23
 * Time: 上午11:24
 */

namespace Lmh\Cpcn\Support;


trait ArrayTrait
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}