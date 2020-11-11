<?php
declare(strict_types=1);


namespace Test;


use Lmh\Cpcn\Request\TrdT2031Request;
use Lmh\Cpcn\Response\TrdT2031Response;
use Lmh\Cpcn\Constant\ResponseCode;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T2031Test extends TestCase
{

    public function test()
    {
        $config = [
            'sandbox' => true,
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn.log',
                'level' => 'debug',
            ],
            'ptnCode' => 'ZWYA2019',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' =>  __DIR__ . '/zj_store/ptntest.pfx',
            'certificateFilename' => __DIR__ . '/zj_store/pfdstest.cer',
        ];

        $trdClient = new TrdClient($config);
        $trdT1001Request = new TrdT2031Request();


        /**
         * @var TrdT2031Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT2031Response());
        var_dump($response);exit;
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}