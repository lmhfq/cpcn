<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Provider;


use Lmh\Cpcn\Support\Logger;
use Lmh\Cpcn\Support\ServiceContainer;
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