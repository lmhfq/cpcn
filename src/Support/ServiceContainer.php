<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


use Lmh\Cpcn\Provider\ConfigServiceProvider;
use Lmh\Cpcn\Provider\LogServiceProvider;
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
    public function getProviders(): array
    {
        return array_merge([
            ConfigServiceProvider::class,
            LogServiceProvider::class,
        ], $this->providers);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        $service = get_called_class();
        $serviceData = explode('\\', $service);
        if (isset($serviceData[3]) && $serviceData[3] == 'Ep') {
            $baseUri = 'https://www.china-clearing.com';
            if (isset($this->userConfig['sandbox']) && $this->userConfig['sandbox'] == true) {
                $baseUri = 'https://test.cpcn.com.cn';
            }
        } else {
            $baseUri = 'https://zhirong.cpcn.com.cn';
            if (isset($this->userConfig['sandbox']) && $this->userConfig['sandbox'] == true) {
                $baseUri = 'https://ctest.cpcn.com.cn';
            }
        }
        $base = [
            'http' => [
                'timeout' => 60.0,
                'base_uri' => $baseUri,
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