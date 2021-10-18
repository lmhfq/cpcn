<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


class SignatureFactory
{
    /**
     * @var PriKeySigner
     */
    private static $signer;

    /**
     * @return PriKeySigner
     */
    public static function getSigner(): ?PriKeySigner
    {
        return self::$signer;
    }

    /**
     * @param mixed $signer
     */
    public static function setSigner(PriKeySigner $signer): void
    {
        self::$signer = $signer;
    }
}