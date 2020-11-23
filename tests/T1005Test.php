<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Test;


use GuzzleHttp\Exception\GuzzleException;
use Lmh\Cpcn\Request\TrdT1005Request;
use Lmh\Cpcn\Response\TrdT1005Response;
use Lmh\Cpcn\Constant\ResponseCode;
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
//            'keystoreFilename' => __DIR__ . '/zj_store/ptntest.pfx',
//            'keystorePassword' => "1",
            'keyContent' => '-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMUELrX57iKXMOhW
Q61wGiYN67lnHTP66VcZCGUS/M4sBdPskV1x0LZNXoMJoP0nOpSiWIDnFIodXlG4
N5oaOC5upYP7qkLm78x2npJQ6qz0DGmKmy2iq+PysK2qJPVSSIVXVSu4375NWtYo
OkDt7JN9PfXU/S9RZnzhb1BIAOg3AgMBAAECgYARCf+QNYFm9HSCY5OO2Hcqe2G7
szNPX4/2vG+Bblb27c/DOF6KGmHWonJeGuMVgeMLH89PtqyMFWYm4yvL5CCfnIxF
v8xw8ROiALKjf/lL6/ylzypBaCGToWK1VYTO9Ltk9OSGmI36vBzMP4s8XkdAcsjj
6hM8U0yOfmFfVF/1wQJBAOf49gG915uSx1BhQiA9VP//pHTRKQETwMQzJ3csWQiW
dt4LoNBlTAa4Ix/sqKNKPWUAjzbraSLedp65L/HhZD8CQQDZbFC6aWec0QwuKOOs
k4NvatB5sWwLJcnM05PrVOh1T1aLpeJ7JqaS5YdL5P6oxuNIDiA0mbSK/bxq0yLJ
ax4JAkEA2NDq5u/RATkskCWHj+ijdO81gHYq1DXpO7jwT0QlJ5CzI5FMytuTNsiP
E/y4Fn+CaNAgC932k7/IsUw30uWvMwJBAJJXTFLcBUhQkGE1VmDe/PVuMJnoKG+s
ZJJ/yiz4fmoPF5Jw+eqoDjALW7BilmFlVK84Csc8uX9f34ULTXvCpHkCQGcNuvVc
Mnk8i45tCIB+hXF1bBOuT7AAdpsQmmMGD12x5+EzA0VF1uBSfZ/tM3DWB93UcPHH
EtSka6FB60ZZ8ik=
-----END PRIVATE KEY-----',
            'certificateFilename' => __DIR__ . '/zj_store/pfdstest.cer',
        ];

        $trdClient = new TrdClient($config);
        $trdT1001Request = new TrdT1005Request();
        $trdT1001Request->setCltaccSubno("2025209000207699");
        $trdT1001Request->setCltaccCltnm("童宇涛");
        /**
         * @var TrdT1005Response $response
         */
        try {
            $response = $trdClient->execute($trdT1001Request, new TrdT1005Response());
        } catch (GuzzleException $e) {
        }
        $this->assertEquals(ResponseCode::SUCCESS, $response->getMsghdRspcode());
    }
}