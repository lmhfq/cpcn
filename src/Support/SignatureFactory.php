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
     * @return mixed
     */
    public static function getSigner()
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