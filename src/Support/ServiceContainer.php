<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


use Lmh\Cpcn\Provider\ConfigServiceProvider;
use Lmh\Cpcn\Provider\LogServiceProvider;
use Pimple\Container;

class ServiceContainer extends Container
{
    protected $sandbox = false;
    /**
     * @var array
     */
    protected $userConfig = [];
    /**
     * @var array
     */
    protected $providers = [];


    public function __construct(array $config = [], array $prepends = [])
    {
        parent::__construct($prepends);

        $this->userConfig = $config;

        $this->registerProviders($this->getProviders());
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
                'timeout' => 60.0,
                'base_uri' => 'https://zhirong.cpcn.com.cn/acswk/interfaceII.htm',
            ],
            'debug' => false,
            'log' => [
                'name' => 'cpcn',
                'path' => '/tmp/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => '',
            'bkCode' => '',
            'keystoreFilename' => '',
            'keystorePassword' => '',
            'keyContent' => '',
            'certificateFilename' => '',
            'certContent' => '',
        ];
        if (isset($this->userConfig['sandbox']) && $this->userConfig['sandbox'] == true) {
            $base['http']['base_uri'] = 'https://ctest.cpcn.com.cn/acswk/interfaceII.htm';
        }
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