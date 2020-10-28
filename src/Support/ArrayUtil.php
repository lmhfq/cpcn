<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


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