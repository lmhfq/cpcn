<?php
declare(strict_types=1);

namespace Cpcn\Support;


use Cpcn\Exception\InvalidConfigException;
use Exception;

class PriKeySigner
{
    /**
     * @var string
     */
    private $keystoreFilename;

    public function __construct(string $filepath)
    {
        $this->keystoreFilename = $filepath;
    }

    /**
     * @param string $plainText
     * @return string
     * @throws InvalidConfigException
     */
    public function sign(string $plainText)
    {
        $p12cert = [];
        $fd = fopen($this->keystoreFilename, 'r');
        if ($fd === false) {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        $p12buf = fread($fd, filesize($this->keystoreFilename));
        fclose($fd);
        openssl_pkcs12_read($p12buf, $p12cert, '1');
        $pkeyId = $p12cert["pkey"];
        $signature = "";
        try {
            openssl_sign($plainText, $signature, $pkeyId, OPENSSL_ALGO_SHA1);
        } catch (Exception $e) {
        }
        return bin2hex($signature);
    }
}