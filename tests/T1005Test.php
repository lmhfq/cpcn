<?php
declare(strict_types=1);


namespace Test;


use Lmh\Cpcn\Request\TrdT1005Request;
use Lmh\Cpcn\Response\TrdT1005Response;
use Lmh\Cpcn\Support\ResponseCode;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T1005Test extends TestCase
{

    public function test()
    {
        $config = [
            'sandbox' => true,
            'debug' => true,
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => 'ZWYA2019',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' => __DIR__ . '/zj_store//ptntest.pfx',
            'certificateFilename' => __DIR__ . '/zj_store/pfdstest.cer',
        ];

        $trdClient = new TrdClient($config);
        $trdT1001Request = new TrdT1005Request();

        /**
         * @var TrdT1005Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT1005Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}