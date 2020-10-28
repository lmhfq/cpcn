<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Provider;


use Lmh\Cpcn\Support\ServiceContainer;
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