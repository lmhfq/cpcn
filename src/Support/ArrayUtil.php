<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 下午2:32
 */

namespace Cpcn\Support;


class ArrayUtil
{
    /**
     * @param $key
     * @param array $search
     * @param string $default
     * @return mixed|string
     */
    public static function get($key, array $search, $default = '')
    {
        return array_key_exists($key, $search) ? $search[$key] : $default;
    }
}