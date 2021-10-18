# 中金支付PHP SDK

```
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
  $trdT1001Request = new TrdT1002Request();
  /**
   * @var TrdT1002Response $response
   */
  $response = $trdClient->execute($trdT1001Request, new TrdT1002Response());
  $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode(
```