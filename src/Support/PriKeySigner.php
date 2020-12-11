<?php
declare(strict_types=1);

namespace Lmh\Cpcn\Support;


use Exception;
use Lmh\Cpcn\Exception\InvalidConfigException;

class PriKeySigner
{
    /**
     * @var string
     */
    private $keystoreFilename;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $keyContent;
    /**
     * @var string
     */
    private $certificateFilename;
    /**
     * @var string
     */
    private $certContent;

    public function __construct(string $filepath = '', string $password = '', string $keyContent = '', string $certificateFilename = '', string $certContent = '')
    {
        $this->keystoreFilename = $filepath;
        $this->password = $password;
        $this->keyContent = $keyContent;
        $this->certificateFilename = $certificateFilename;
        $this->certContent = $certContent;
    }

    /**
     * @param string $plainText
     * @return string
     * @throws InvalidConfigException
     */
    public function sign(string $plainText)
    {
        if ($this->keyContent) {
            $privateKeyId = $this->keyContent;
        } else if ($this->keystoreFilename) {
            $certStore = file_get_contents($this->keystoreFilename);
            openssl_pkcs12_read($certStore, $p12cert, $this->password);
            $privateKeyId = $p12cert["pkey"];
        } else {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        $signature = "";
        try {
            openssl_sign($plainText, $signature, $privateKeyId, OPENSSL_ALGO_SHA1);
        } catch (Exception $e) {
        }
        return bin2hex($signature);
    }

    /**
     * @param string $plainText
     * @param string $signature
     * @return int
     * @throws InvalidConfigException
     */
    public function verify(string $plainText, string $signature)
    {
        if ($this->certContent) {
            $cert = $this->certContent;
        } else if ($this->certificateFilename) {
            $cert = file_get_contents($this->certificateFilename);
        } else {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        $binarySignature = pack("H" . strlen($signature), $signature);
        return openssl_verify($plainText, $binarySignature, $cert, OPENSSL_ALGO_SHA1);
    }
}