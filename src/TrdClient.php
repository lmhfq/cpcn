<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2020/10/16
 * Time: 下午8:27
 */

namespace Cpcn;


use Cpcn\Request\TrdBaseRequest;
use Cpcn\Response\TrdBaseResponse;
use Cpcn\Support\PriKeySigner;
use Cpcn\Support\SignatureFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class TrdClient
{
    /**
     * @var array
     */
    protected $config;

    /**
     * TrdClient constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $this->getConfig($config);
    }

    /**
     * @param TrdBaseRequest $request
     * @param TrdBaseResponse $response
     * @return TrdBaseResponse
     * @throws GuzzleException
     */
    public function execute(TrdBaseRequest $request, TrdBaseResponse $response): TrdBaseResponse
    {
        $request->setMsghdPtncd($this->config['ptnCode']);
        $request->setMsghdBkcd($this->config['ptnCode']);
        SignatureFactory::setSigner(new PriKeySigner($this->config['keystoreFilename']));
        $request->toXml();
        $data = [
            'message' => $request->getRequestMessage(),
            'signature' => $request->getRequestSignature(),
            'trdcode' => $request->getMsghdTrcd(),
            'ptncode' => $request->getMsghdPtncd(),
        ];
        $resultMessage = $this->request($data);
        $response->toXml($resultMessage);
        return $response;
    }

    /**
     * @param array $userConfig
     * @return array
     */
    public function getConfig(array $userConfig)
    {
        $base = [
            'http' => [
                'timeout' => 30.0,
                'base_uri' => 'https://zhirong.cpcn.com.cn/acswk/interfaceII.htm',
            ],
            'ptnCode' => 'WYAN0002',
            'bkCode' => 'ZBANK001',
            'keystoreFilename' => '',
            'certificateFilename' => '',
        ];
        return array_replace_recursive($base, $userConfig);
    }

    /**
     * @param array $data
     * @return string
     * @throws GuzzleException
     */
    private function request(array $data)
    {

        $client = new Client($this->config['http']);
        $options = [
            'headers' => [
                'Accept' => 'text/xml; charset=UTF8',
            ],
            'form_params' => $data,
        ];

        $response = $client->request('POST', '', $options);
        return $response->getBody()->getContents();
    }
}