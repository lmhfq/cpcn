<?php
declare(strict_types=1);


namespace tests;


use Cpcn\Request\TrdT3003Request;
use Cpcn\Response\TrdT3003Response;
use Cpcn\Support\ResponseCode;
use Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T3003Test extends TestCase
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
        $trdT1001Request = new TrdT3003Request();
        /**
         * @var TrdT3003Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT3003Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}