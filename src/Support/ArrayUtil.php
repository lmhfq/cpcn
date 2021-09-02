<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


class ArrayUtil
{
    /**
     * @param $key
     * @param $search
     * @param string|array $default
     * @return mixed|string
     */
    public static function get($key,  $search, $default = '')
    {
        if (empty($search) || !is_array($search)) {
            return $default;
        }
        return array_key_exists($key, $search) ? $search[$key] : $default;
    }
}