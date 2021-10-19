<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Support;


use Exception;
use Lmh\Cpcn\Exception\InvalidConfigException;

class RSASigner
{
    /**
     * @var string
     */
    private $keyContent;
    /**
     * @var string
     */
    private $certContent;

    public function __construct(string $filepath = '', string $password = '', string $keyContent = '', string $certificateFilePath = '', string $certContent = '')
    {
        if ($certContent) {
            $this->certContent = $certContent;
        } else if ($certificateFilePath) {
            $this->certContent = file_get_contents($certificateFilePath);
        }
        if ($keyContent) {
            $this->keyContent = $keyContent;
        } else if ($filepath) {
            $pkcs12 = file_get_contents($filepath);
            openssl_pkcs12_read($pkcs12, $p12cert, $password);
            $this->keyContent = $p12cert["pkey"];
        }
    }

    /**
     * 生成签名
     * @param string $plainText
     * @return string
     * @throws InvalidConfigException
     */
    public function sign(string $plainText): string
    {
        if (!$this->keyContent) {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        $signature = "";
        try {
            openssl_sign($plainText, $signature, $this->keyContent, OPENSSL_ALGO_SHA1);
        } catch (Exception $e) {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        return bin2hex($signature);
    }

    /**
     * 验证签名
     * @param string $plainText
     * @param string $signature
     * @return int
     * @throws InvalidConfigException
     */
    public function verify(string $plainText, string $signature): int
    {
        if (!$this->certContent) {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        $binarySignature = pack("H" . strlen($signature), $signature);
        return openssl_verify($plainText, $binarySignature, $this->certContent, OPENSSL_ALGO_SHA1);
    }
}