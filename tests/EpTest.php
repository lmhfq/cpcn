<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:09
 */

namespace Lmh\Cpcn\Test;

use Lmh\Cpcn\Constant\InnerCodeData;
use Lmh\Cpcn\Constant\RedirectPay;
use Lmh\Cpcn\Constant\UserType;
use Lmh\Cpcn\Entity\Tx\AccountEntity;
use Lmh\Cpcn\Entity\Tx\AttachInfoEntity;
use Lmh\Cpcn\Entity\Tx\BankAccountEntity;
use Lmh\Cpcn\Entity\Tx\ImageInfoEntity;
use Lmh\Cpcn\Entity\Tx\PayDataEntity;
use Lmh\Cpcn\Factory;
use Lmh\Cpcn\Service\Ep\Notify\BaseNotify;
use Lmh\Cpcn\Service\Ep\Notify\Tx4618Notify;
use Lmh\Cpcn\Service\Ep\Request\Tx2734Request;
use Lmh\Cpcn\Service\Ep\Request\Tx2751Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4600Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4601Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4611Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4613Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4616Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4641Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4643Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4645Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4656Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4691Request;
use Lmh\Cpcn\Service\Ep\Request\Tx4693Request;
use Lmh\Cpcn\Service\Ep\Request\Tx5011Request;
use Lmh\Cpcn\Service\Ep\Request\Tx5021Request;
use Lmh\Cpcn\Service\Ep\Request\Tx5031Request;
use Lmh\Cpcn\Service\Ep\Request\Tx5036Request;
use Lmh\Cpcn\Service\Ep\Request\Tx7703Request;
use Lmh\Cpcn\Service\Ep\Response\Tx2751Response;
use Lmh\Cpcn\Service\Ep\Response\Tx4611Response;
use Lmh\Cpcn\Service\Ep\Response\Tx4616Response;
use Lmh\Cpcn\Service\Ep\Response\Tx4641Response;
use Lmh\Cpcn\Service\Ep\Response\Tx4691Response;
use Lmh\Cpcn\Service\Ep\Response\Tx4693Response;
use Lmh\Cpcn\Service\Ep\Response\Tx5036Response;
use Lmh\Cpcn\Support\Base64Image;
use PHPUnit\Framework\TestCase;

class EpTest extends TestCase
{
    public function test()
    {
        $config = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://test.cpcn.com.cn',
            ],
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn' . date("md") . '.log',
                'level' => 'debug',
            ],
            'sandbox' => true,
            'institutionId' => '006870',
            'keystoreFilename' => __DIR__ . '/config/test.pfx',
            'certificateFilename' => __DIR__ . '/config/paytest.cer',
            'keystorePassword' => "cfca1234"
        ];

        $client = Factory::ep($config);

        $request = new Tx4600Request();
        $request->setTxSn(EpTest::get());
        $imageInfoList = [];
        $imageInfoEntity = new ImageInfoEntity();
        $imageInfoEntity->setImageType(10);
        $imageInfoEntity->setItemNo(EpTest::get() . '001');
        $base64Image = Base64Image::fromPath('https://t10.baidu.com/it/u=442401012,1383995227&fm=173&app=49&f=JPEG?w=640&h=399&s=8A63C7144B1A65C84A545DC20300E0B0');
        $imageInfoEntity->setImageContent($base64Image->getContent());
        $imageInfoList[] = $imageInfoEntity;
        $imageInfoEntity = new ImageInfoEntity();
        $imageInfoEntity->setImageType(11);
        $imageInfoEntity->setItemNo(EpTest::get() . '002');
        $base64Image = Base64Image::fromPath('https://t10.baidu.com/it/u=442401012,1383995227&fm=173&app=49&f=JPEG?w=640&h=399&s=8A63C7144B1A65C84A545DC20300E0B0');
        $imageInfoEntity->setImageContent($base64Image->getContent());
        $imageInfoList[] = $imageInfoEntity;
        $imageInfoEntity = new ImageInfoEntity();
        $imageInfoEntity->setImageType(20);
        $imageInfoEntity->setItemNo(EpTest::get() . '003');
        $base64Image = Base64Image::fromPath('https://t10.baidu.com/it/u=442401012,1383995227&fm=173&app=49&f=JPEG?w=640&h=399&s=8A63C7144B1A65C84A545DC20300E0B0');
        $imageInfoEntity->setImageContent($base64Image->getContent());
        $imageInfoList[] = $imageInfoEntity;
        $imageInfoEntity = new ImageInfoEntity();
        $imageInfoEntity->setImageType(21);
        $imageInfoEntity->setItemNo(EpTest::get() . '004');
        $base64Image = Base64Image::fromPath('https://t10.baidu.com/it/u=442401012,1383995227&fm=173&app=49&f=JPEG?w=640&h=399&s=8A63C7144B1A65C84A545DC20300E0B0');
        $imageInfoEntity->setImageContent($base64Image->getContent());
        $imageInfoList[] = $imageInfoEntity;
        $request->setImageInfo($imageInfoList);


        $request = new Tx4601Request();
        $request->setUserId("217000001");
        $request->setTxSn(EpTest::get());
//        $request->setParentUserId();
        $request->setUserType(UserType::CORPORATION);
        $request->setBusinessType(10);
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');
        $request->setImageCollectionTxSn('20220217013739574909');
        $accountData = new AccountEntity();
        $accountData->setCorporationName('济南市长清区丰酬熟食店');
        $accountData->setCorporationShort('丰酬熟食店');
        $accountData->setEmail('991564110@qq.com');
        $accountData->setAddress('浙江杭州');
        $accountData->setProvince('33');
        $accountData->setCity('330100');
        $accountData->setDistrict('330102');
        $accountData->setUnifiedSocialCreditCode('92370113MA3HJP4T2C');
        $accountData->setAllLicenceIssDate('20220101');
        $accountData->setAllLicenceExpiryDate('20990101');
        //法人
        $accountData->setUserName('颜竹茂');
        $accountData->setCredentialNumber('330328198608220876');
        $accountData->setIssDate('20100201');
        $accountData->setExpiryDate('20350201');
        $accountData->setContactNumber('18133344454');
        $request->setAccountData($accountData);


//        $request = new Tx4601Request();
//        $request->setUserId("111111115");
//        $request->setTxSn(EpTest::get());
//        $request->setParentUserId("111111112");
//        $request->setUserType(UserType::INDIVIDUAL);
//        $request->setBusinessType(20);
//        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');
//
//        $accountData = new AccountEntity();
//        $accountData->setEmail('991564110@qq.com');
//        $accountData->setAddress('浙江杭州');
//        //开户人
//        $accountData->setUserName('郑红红');
//        $accountData->setCredentialNumber('140105199003076510');
//        $accountData->setIssDate('20100201');
//        $accountData->setExpiryDate('20350201');
//        $accountData->setContactNumber('18133344453');
//        $request->setAccountData($accountData);
//
//        $bankAccountEntity = new BankAccountEntity();
//        $bankAccountEntity->setBindingTxSn(EpTest::get());
//        $bankAccountEntity->setBankId("103");
//        $bankAccountEntity->setBankAccountNumber('6228482322222111112');
//        $bankAccountEntity->setBankPhoneNumber('18133344453');
//        $request->setBankAccount($bankAccountEntity);


        $request = new Tx4611Request();
        $request->setUserId("335655629202915328");
        $request->setBindingWay(10);
        $request->setBankCardType(10);
        $request->setCredentialNumber("420321197907259052");
        $bankAccountEntity = new BankAccountEntity();
        $bankAccountEntity->setBindingTxSn(EpTest::get());
        $bankAccountEntity->setBankId("104");
        $bankAccountEntity->setBankAccountName('邓苛桂');
        $bankAccountEntity->setBankAccountType(11);
        $bankAccountEntity->setBankAccountNumber('6216702122334455510');
        $bankAccountEntity->setBranchName('中国银行');
        $bankAccountEntity->setProvince('33');
        $bankAccountEntity->setBankPhoneNumber('15367234334');
        $bankAccountEntity->setCity('330100');
        $request->setBankAccount($bankAccountEntity);
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');





        $request = new Tx4613Request();
        $request->setUserId("335234565918425088");
        $request->setTxSn("22021805779547113612");
        $request->setVerifyWay(20);
        $request->setAmount(13);





        $request = new Tx7703Request();
        $request->setUserId("217000001");
        $request->setApplyNo(EpTest::get());
        $request->setProtocolNumber("000125");
        $request->setProtocolSignerType(10);
        $request->setImmediatelySign(10);
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');
        $request->setOperationType(20);
        $bankAccountEntity = new BankAccountEntity();
        $bankAccountEntity->setBindingTxSn(EpTest::get());
        $bankAccountEntity->setBankId("103");
        $bankAccountEntity->setBankAccountName('济南市长清区丰酬熟食店');
        $bankAccountEntity->setBankAccountNumber('370113600368821');
        $bankAccountEntity->setBranchName('中国农业银行营山县支行');
        $bankAccountEntity->setProvince('33');
        $bankAccountEntity->setCity('330100');
        $request->setBankAccount($bankAccountEntity);


        $request = new Tx4641Request();
        $request->setTxSn(EpTest::get());
        $request->setUserId("335234565918425088");
        $request->setPaymentWay(10);
        $request->setAmount(10);
        $request->setExpirePeriod(10);
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');
        $request->setRemark('10');

        $payDataEntity = new PayDataEntity();
        $payDataEntity->setBindingTxSn(EpTest::get());
        $payDataEntity->setSmsVerification(0);
        $request->setPayData($payDataEntity);



        $request = new Tx4691Request();
        $request->setUserId("335655629202915328");
        $res = $client->execute($request, new Tx4691Response());


        $request = new Tx4693Request();
        $request->setUserId("335655629202915328");


        $request = new Tx4643Request();
        $request->setTxSn(EpTest::get());
        $request->setUserId("217000001");
        $request->setBindingTxSn("20220217022707198757");
        $request->setAmount(10);
        $request->setArrivalType(10);
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify/notify');




        $request = new Tx4645Request();
        $request->setTxSn(EpTest::get());
        $request->setPayerUserId("335234565918425088");
        $request->setPayeeUserId("335655629202915328");
        $request->setAmount(10);
        $request->setArrivalType(10);


        $request = new Tx4656Request();
        $request->setSourceTxCode("4645");
        $request->setSourceTxSn("20220215014339127891");


        $request = new Tx5011Request();
        $request->setTxSn(EpTest::get());
        $request->setOrderNo(EpTest::get());
        $request->setPayeeUserId('217000001');
        $request->setPayerUserId('1');
        $request->setPaymentWay('80');
        $request->setAmount(900);
        $request->setPageUrl('https://payment.wyawds.com/cpcn/ep/notify');
        $request->setNoticeUrl('https://payment.wyawds.com/cpcn/ep/notify');
        $request->setGoodsName('10');
        $request->setPlatformName('31');
        $request->setRemark('茅台酒');
        $request->setClientIP(  isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        $request->setHasSubsequentSplit(2);
        $request->setDeductionSettlementFlag("0001");


        $payDataEntity = new PayDataEntity();
        $payDataEntity->setPayWay(RedirectPay::PAYWAY_MINI_PROGRAM);
        $payDataEntity->setPayType(RedirectPay::PAYTYPE_WECHAT);
        $payDataEntity->setSubAppId("wx55d46b918ab37285");
        $payDataEntity->setSubOpenId("xxa");
        $payDataEntity->setRedirectSource("20");
        $request->setPayData($payDataEntity);



        $request = new Tx5021Request();
        $request->setTxSn(EpTest::get());
        $request->setPaymentTxSn("20220217111734475007");
        $request->setRefundWay(20);
        $request->setAmount(800);



        $request = new Tx2734Request();
        $request->setApplyNo(EpTest::get());
        $request->setUserId("217000001");
        $request->setBindingTxSn("20220217022707198757");
        $request->setPayWay("10");
        $request->setCategory(111);
        $attachInfoList = [];
        $attachInfoEntity = new AttachInfoEntity();
        $attachInfoEntity->setPayType("12");
        $attachInfoEntity->setAppId("wx55d46b918ab37285");
        $attachInfoList[] = $attachInfoEntity;

        $attachInfoEntity = new AttachInfoEntity();
        $attachInfoEntity->setPayType("00");
        $attachInfoList[] = $attachInfoEntity;
        $attachInfoEntity = new AttachInfoEntity();
        $attachInfoEntity->setPayType("13");
        $attachInfoList[] = $attachInfoEntity;
        $request->setAttachInfoList($attachInfoList);


        $request = new Tx4616Request();
        $request->setSourceTxCode("4601");
        $request->setSourceTxSn("22021902360432134346");
        $request->setUserType(11);






        $request = new Tx2751Request();
        $request->setTxSn(EpTest::get());
        $request->setAccountNumber("6228482390599211219");

        $request = new Tx5031Request();
        $request->setTxSn(EpTest::get());
        $request->setPaymentTxSN('22022108645299104917');
        $request->setRemainFundsProcess(2);

        $splitItems =[];


        $request->setSplitItems($splitItems);


        $request = new Tx5036Request();
        $request->setTxSn('20220221142032806248');
        $request->setSourceTxCode("5011");
        $request->setSourceTxTime("20220221");
        $res = $client->execute($request, new Tx5036Response());
        var_dump($res);exit;


        $res = InnerCodeData::getProvincesList();
        $res = $client->execute($request, new Tx2751Response());

        var_dump($res);
    }

    /**
     * @author lmh
     */
    public function testNotify(){
        $data ='{
    "digitalEnvelope":"",
    "encryptSN":"",
    "isDgEnv":"NO",
    "message":"PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjxSZXF1ZXN0Pgo8SGVhZD4KPFR4Q29kZT41MDE4PC9UeENvZGU+CjwvSGVhZD4KPEJvZHk+CjxJbnN0aXR1dGlvbklEPjAwNjg3MDwvSW5zdGl0dXRpb25JRD4KPE9yZGVyTm8+MjAyMjAyMTcwMzQyMzczMDQ4NTU8L09yZGVyTm8+CjxUeFNOPjIwMjIwMjE3MDM0MjM3MDgxNjQ2PC9UeFNOPgo8QW1vdW50PjgwMDwvQW1vdW50Pgo8QXZhaWxhYmxlU3BsaXRBbW91bnQ+MDwvQXZhaWxhYmxlU3BsaXRBbW91bnQ+CjxTdGF0dXM+NDA8L1N0YXR1cz4KPFBheW1lbnRXYXk+ODA8L1BheW1lbnRXYXk+CjxRUlBheW1lbnRUeXBlPjMxPC9RUlBheW1lbnRUeXBlPgo8UVJQYXltZW50V2F5PjQ1PC9RUlBheW1lbnRXYXk+CjxCYW5rVHJhY2VOby8+CjxFeHBpcmVUaW1lPjIwMjIwMjE3MTI1MjAzODI4PC9FeHBpcmVUaW1lPgo8UGF5ZWVVc2VySUQ+MjE3MDAwMDAxPC9QYXllZVVzZXJJRD4KPFBheWVlQWNjb3VudE51bWJlcj41MDAwNjg3MDAwMDAyODczNjwvUGF5ZWVBY2NvdW50TnVtYmVyPgo8U3ViT3BlbklELz4KPFBheUFtb3VudD44MDA8L1BheUFtb3VudD4KPFN1cHBsZW1lbnRSZWdpb24vPgo8QWN0dWFsQ2FyZFR5cGUvPgo8UGF5ZXJJRC8+CjxSZXNwb25zZVRpbWU+MjAyMjAyMTcxMTUyMDM4ODI8L1Jlc3BvbnNlVGltZT4KPFJlc3BvbnNlQ29kZS8+CjxSZXNwb25zZU1lc3NhZ2U+6K6h6LS56YWN572u5LiN5a2Y5ZyoPC9SZXNwb25zZU1lc3NhZ2U+CjxUcmFjZU5vLz4KPEFwcGx5Q29kZU5PLz4KPEFjdHVhbFBheVR5cGUvPgo8VWRJRC8+CjwvQm9keT4KPC9SZXF1ZXN0Pg==",
    "signAlgorithm":"SHA1withRSA",
    "signSN":"298b35b1c8838d4ff20432840a2a9e74",
    "signature":"5681CE3D467635BE10509B7D6C65876129692CFFF87E46574C63EEA8ED594F10DB4E9DF4035B67A671642A540208351AC1EC0EF1B7C353727CA9EE806F74041A9FACB6A2A5F90804D5DC4B460F373925F0700525ED063835AB7FD5FF6A419BC3E786B216923EB39423A0198B4621994B6B6CEC1DE046FFC083F760D10819106D"
}';
        $data = json_decode($data,true);
        $config = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://test.cpcn.com.cn',
            ],
            'log' => [
                'name' => 'cpcn',
                'path' => __DIR__ . '/cpcn' . date("md") . '.log',
                'level' => 'debug',
            ],
            'sandbox' => true,
            'institutionId' => '006870',
            'keystoreFilename' => __DIR__ . '/config/test.pfx',
            'certificateFilename' => __DIR__ . '/config/paytest.cer',
            'keystorePassword' => "cfca1234"
        ];

        $client = Factory::ep($config);
        $baseNotify = $client->notify($data['message'], $data['signature'], new BaseNotify());
        $txCode = $baseNotify->getTxCode();

        $class  =  new Tx4618Notify($baseNotify->getTxCode());
      var_dump($baseNotify->getTxCode());
    }


    public static function get(): string
    {
        return date('YmdHis') . str_pad((string)mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }
}