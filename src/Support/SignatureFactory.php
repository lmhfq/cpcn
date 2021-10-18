<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


class SignatureFactory
{
    /**
     * @var RSASigner
     */
    private static $signer;

    /**
     * @return RSASigner
     */
    public static function getSigner(): ?RSASigner
    {
        return self::$signer;
    }

    /**
     * @param mixed $signer
     */
    public static function setSigner(RSASigner $signer): void
    {
        self::$signer = $signer;
    }
}