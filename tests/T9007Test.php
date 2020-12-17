<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Test;


use Lmh\Cpcn\Request\TrdT9007Request;
use Lmh\Cpcn\Response\TrdT9007Response;
use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T9007Test extends TestCase
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
        $trdT9007Request = new TrdT9007Request();
        /**
         * @var TrdT9007Response $response
         */
        $response = $trdClient->execute($trdT9007Request, new TrdT9007Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}