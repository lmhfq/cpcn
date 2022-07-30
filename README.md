# 中金 中金支付PHP SDK

## 账服通

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
        'keyContent' => 'keyContent',
        'certContent' => 'certContent',
        //'keystoreFilename' =>__DIR__ . '/../../config/ptntest.pfx',
        //'certificateFilename' => __DIR__ . '/../../config/pfdstest.cer',
  ];

  $trdClient = Factory::acs($config);
  $trdT1001Request = new TrdT1002Request();
  /**
   * @var TrdT1002Response $response
   */
  $response = $trdClient->execute($trdT1001Request, new TrdT1002Response());
  $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode(
```

## 壹企付

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
        'signerType' => 1,//1国密证书，2国际证书,
        'cfcaLogFilePath' => '/resource/cfcalog.conf'
        'institutionId' => '11111',
        //'keyContent' => 'keyContent',
        'certContent' => 'certContent',
        //'keystorePassword' => 'keystorePassword',
        //'keystoreFilename' =>__DIR__ . '/../../config/ptntest.pfx',
  ];

  $trdClient = Factory::ep($config);
  $request = new Tx5011Request();
  $request->setHasSubsequentSplit(1);
  /**
   * @var Tx5011Response $response
   */
  $response = $trdClient->execute($request, new Tx5011Response());
  $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode(
```
