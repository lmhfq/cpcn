<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Test;


use Lmh\Cpcn\Request\TrdT4003Request;
use Lmh\Cpcn\Response\TrdT4003Response;
use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T4003Test extends TestCase
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
        $trdT1001Request = new TrdT4003Request();
        /**
         * @var TrdT4003Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT4003Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}