<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/20
 * Time: 下午3:14
 */

namespace tests;


use Cpcn\Request\TrdT1031Request;
use Cpcn\Response\TrdT1031Response;
use Cpcn\Support\ResponseCode;
use Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class T1031Test extends TestCase
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
            'keystoreFilename' => __DIR__ . '/zj_store/ptntest.pfx',
            'certificateFilename' => __DIR__ . '/zj_store/trztest.cer',
        ];

        $trdClient = new TrdClient($config);
        $trdT1001Request = new TrdT1031Request();
        /**
         * @var TrdT1031Response $response
         */
        $response = $trdClient->execute($trdT1001Request, new TrdT1031Response());
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}