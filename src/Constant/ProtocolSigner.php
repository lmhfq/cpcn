<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午4:37
 */

namespace Lmh\Cpcn\Constant;


class ProtocolSigner
{
    /**
     * 协议签署人类型
     * 10-企业法人（企业）
     * 20-经办人（企业）
     * 30-个体工商户自身(个体）
     */
    public const TYPE_LEGAL_PERSON = 10;
    public const TYPE_AGENT = 20;
    public const TYPE_SELF = 30;
}