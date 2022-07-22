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
    /**
     * @var string
     */
    private $keystoreFilePath;
    /**
     * @var string
     */
    private $password;
    /**
     * @var int 1国密证书，2国际证书
     */
    private $signerType;
    /**
     * @var string
     */
    private $cfcaLogFilePath = "./cfcalog.conf";

    public function __construct(string $keyFilepath = '', string $password = '', string $keyContent = '', string $certificateFilePath = '', string $certContent = '', int $signerType = 2)
    {
        $this->signerType = $signerType;
        if ($certContent) {
            $this->certContent = $certContent;
        } else if ($certificateFilePath) {
            $this->certContent = file_get_contents($certificateFilePath);
        }
        if ($this->signerType == 2) {
            if ($keyContent) {
                $this->keyContent = $keyContent;
            } else if ($keyFilepath) {
                $pkcs12 = file_get_contents($keyFilepath);
                openssl_pkcs12_read($pkcs12, $p12cert, $password);
                $this->keyContent = $p12cert["pkey"];
            }
        }
        $this->keystoreFilePath = $keyFilepath;
        $this->password = $password;
    }

    /**
     * 生成签名
     * @param string $plainText
     * @param int $algorithm
     * @return string
     * @throws InvalidConfigException
     */
    public function sign(string $plainText, int $algorithm = OPENSSL_ALGO_SHA1): string
    {
        $signature = '';
        if ($this->signerType == 1) {
            $result = \cfca_initialize($this->cfcaLogFilePath);
            try {
                if ($result != 0) {
                    throw new InvalidConfigException("cfca_Initialize error:" . $result);
                }
                $result = \cfca_signData_PKCS1('SM2', $plainText, $this->keystoreFilePath, $this->password, 'SM3', $signature);
                if ($result != 0) {
                    throw new InvalidConfigException(" cfca_signData_PKCS7Detached error:" . $result);
                }
                $signature = base64_decode($signature);
            } finally {
                \cfca_uninitialize();
            }
        } else {
            if (!$this->keyContent) {
                throw new InvalidConfigException('合作方的签名证书配置错误');
            }
            try {
                openssl_sign($plainText, $signature, $this->keyContent, $algorithm);
            } catch (Exception $e) {
                throw new InvalidConfigException('合作方的签名证书配置错误');
            }
        }
        return bin2hex($signature);
    }

    /**
     * 验证签名
     * @param string $plainText
     * @param string $signature
     * @param int $algorithm
     * @return int 1 if the signature is correct, 0 if it is incorrect
     * @throws InvalidConfigException
     */
    public function verify(string $plainText, string $signature, int $algorithm = OPENSSL_ALGO_SHA1): int
    {
        if (!$this->certContent) {
            throw new InvalidConfigException('合作方的签名证书配置错误');
        }
        if ($this->signerType == 1) {
            $this->certContent = str_replace(["-----BEGIN CERTIFICATE-----", "-----END CERTIFICATE-----"], "", $this->certContent);
            $result = \cfca_initialize($this->cfcaLogFilePath);
            try {
                if ($result != 0) {
                    throw new InvalidConfigException("cfca_Initialize error:" . $result);
                }
                $signature = hex2bin($signature);
                $signature = base64_encode($signature);
                $result = \cfca_verifyDataSignature_PKCS1('SM2', $plainText, $this->certContent, 'SM3', $signature);
                $verify = $result == 0 ? 1 : 0;
            } finally {
                \cfca_uninitialize();
            }
        } else {
            $binarySignature = pack("H" . strlen($signature), $signature);
            $verify = openssl_verify($plainText, $binarySignature, $this->certContent, $algorithm);
        }
        return $verify;
    }
}