<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/11/18
 * Time: 下午8:57
 */

namespace Lmh\Cpcn\Test;


use Lmh\Cpcn\Service\Acs\Notify\NoticeResponse;
use Lmh\Cpcn\Service\Acs\Notify\NtcT2008Request;
use Lmh\Cpcn\TrdClient;
use PHPUnit\Framework\TestCase;

class NoticeRequestTest extends TestCase
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
            'debug' => true,
            'ptnCode' => 'ZWYA2019',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' => __DIR__ . '/../../config/ptntest.pfx',
            'certificateFilename' => __DIR__ . '/../../config/pfdstest.cer',
        ];

        $trdClient = new TrdClient($config);
        $message = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iR0JLIj8+PE1TRyB2ZXJzaW9uPSIxLjUiPjxNU0dIRD48VHJDZD5UMjAwODwvVHJDZD48VHJEdD4yMDIwMTExODwvVHJEdD48VHJUbT4xMTAyMTk8L1RyVG0+PFRyU3JjPlI8L1RyU3JjPjxQdG5DZD5XWUFOMDAwMjwvUHRuQ2Q+PEJrQ2Q+WkJBTkswMDE8L0JrQ2Q+PC9NU0dIRD48Q2x0QWNjPjxDbHRObz41NDQxMzM5MzcxNjQwMTgyNzwvQ2x0Tm8+PFN1Yk5vPjIwMjQ5MDkwMDAyNzc4MzM8L1N1Yk5vPjxDbHRObT7pnZLlspvmuq/mupDmnKznm7jnlJ/nianlt6XnqIvmnInpmZDlhazlj7g8L0NsdE5tPjwvQ2x0QWNjPjxBbXQ+PEFjbEFtdD4yOTkwPC9BY2xBbXQ+PEZlZUFtdD4wPC9GZWVBbXQ+PFRBbXQ+Mjk5MDwvVEFtdD48Q2N5Q2Q+Q05ZPC9DY3lDZD48L0FtdD48QmtBY2M+PC9Ca0FjYz48U3JsPjxQbGF0U3JsPjIwMzIzMDAwMzE2MjI4ODY8L1BsYXRTcmw+PFNyY1B0blNybD4yMDIwMTExODAwMTAwNTAzNTAwMTEwMjEwMTE2NzY8L1NyY1B0blNybD48L1NybD48VHJzRmxhZz4xPC9UcnNGbGFnPjxVc2FnZT7kuIvljZU8L1VzYWdlPjxEVHJzRmxhZz5CMDA8L0RUcnNGbGFnPjxNZXJjaGFudElkPnN5YngwODI4PC9NZXJjaGFudElkPjxSZXN0VGltZT4yMDIwMTExODExMDIxOTwvUmVzdFRpbWU+PFN0YXRlPjE8L1N0YXRlPjxGRGF0ZT4yMDIwMTExODwvRkRhdGU+PEZUaW1lPjExMDIxMDwvRlRpbWU+PC9NU0c+';
        $ntcBaseRequest = $trdClient->notify($message, '', new NtcT2008Request());


        $noticeResponse = new NoticeResponse($ntcBaseRequest);
        $noticeResponse->setSrlPtnsrl("");
        $noticeResponse->process();

        echo $noticeResponse->getMessage();
    }
}