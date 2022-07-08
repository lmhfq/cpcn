<?php
declare(strict_types=1);


namespace tests;


use Lmh\Cpcn\Factory;
use Lmh\Cpcn\Service\Acs\Request\TrdT1001Request;
use Lmh\Cpcn\Service\Acs\Response\TrdT1001Response;
use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T1001Test extends TestCase
{

    public function test()
    {
        $config = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://ctest.cpcn.com.cn',
            ],
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => 'ZWYA2019',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' => __DIR__ . '/zj_store/ptntest.pfx',
            'certificateFilename' => __DIR__ . '/zj_store/trztest.cer',
            'keystorePassword' => "1"
        ];

        $trdClient = Factory::acs($config);
        $trdT1001Request = new TrdT1001Request();
        /**
         * @var TrdT1001Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT1001Response());
        var_dump($response);
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}