<?php
declare(strict_types=1);


namespace Lmh\Cpcn;


use Illuminate\Support\Str;
use Lmh\Cpcn\Support\ServiceContainer;

/**
 * Class Factory
 * @package Lmh\Cpcn
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * @method static Service\Acs\Application    acs(array $config)
 * @method static Service\Ep\Application    ep(array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array $config
     * @return ServiceContainer
     * @author lmh
     */
    public static function make(string $name, array $config)
    {
        $name = Str::studly($name);
        $application = "\\Lmh\\Cpcn\\Service\\{$name}\\Application";
        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::make($name, ...$arguments);
    }
}