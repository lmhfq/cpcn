<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 下午4:25
 */

namespace Cpcn\Provider;


use Cpcn\Support\ServiceContainer;
use EasyWeChat\Kernel\Config;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['config'] = function ($app) {
            /**
             * @var ServiceContainer $app
             */
            return $app->getConfig();
        };
    }
}