<?php
declare(strict_types=1);


namespace Cpcn\Support;


use Cpcn\Provider\ConfigServiceProvider;
use Cpcn\Provider\LogServiceProvider;
use Pimple\Container;

class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $userConfig = [];
    /**
     * @var array
     */
    protected $providers = [];


    public function __construct(array $config = [], array $prepends = [], string $id = null)
    {
        $this->registerProviders($this->getProviders());

        parent::__construct($prepends);

        $this->userConfig = $config;
    }

    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge([
              ConfigServiceProvider::class,
              LogServiceProvider::class,
        ], $this->providers);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $base = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://zhirong.cpcn.com.cn/acswk/interfaceII.htm',
            ],
            'log' => [
                'name' => 'cpcn',
                'path' => '/tmp/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => '',
            'bkCode' => '',
            'keystoreFilename' => '',
            'certificateFilename' => '',
        ];
        return array_replace_recursive($base, $this->userConfig);
    }

    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}