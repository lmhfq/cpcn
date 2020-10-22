<?php
declare(strict_types=1);


namespace tests;


use Cpcn\Request\TrdT1008Request;
use Cpcn\Response\TrdT1008Response;
use Cpcn\Support\ResponseCode;
use Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T1008Test extends TestCase
{

    public function test()
    {
        $config = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://ctest.cpcn.com.cn/acswk/interfaceII.htm',
            ],
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => 'ZWYA2019',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' =>__DIR__ . '/../../config/ptntest.pfx',
            'certificateFilename' => __DIR__ . '/../../config/pfdstest.cer',
        ];

        $trdClient = new TrdClient($config);
        $trdT1001Request = new TrdT1008Request();
        /**
         * @var TrdT1008Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT1008Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}