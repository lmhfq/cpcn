<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 下午4:28
 */

namespace Cpcn\Provider;


use Cpcn\Support\Logger;
use Cpcn\Support\ServiceContainer;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class LogServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['logger'] = function ($app) {
            /**
             * @var ServiceContainer $app
             */
            return new Logger($app->offsetGet('config'));
        };
    }
}