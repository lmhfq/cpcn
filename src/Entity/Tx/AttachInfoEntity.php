<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/2/13
 * Time: 下午5:21
 */

namespace Lmh\Cpcn\Entity\Tx;


class AttachInfoEntity
{
    /**
     * @var string 支付类别
     * 00-正扫
     * 01-反扫
     * 10-APP
     * 11-JSAPI
     * 12-小程序
     * 13-H5
     */
    protected $payType;
    /**
     * @var string 当使用 JSAPI、小程序时此字段必填
     */
    protected $appId;
    /**
     * @var string 当开通微信公众号支付时此字段必填,最多可填写 5 个路径，不同的路径使用英文逗号分隔
     */
    protected $authPath;

    /**
     * @return string
     */
    public function getPayType(): string
    {
        return $this->payType;
    }

    /**
     * @param string $payType
     */
    public function setPayType(string $payType): void
    {
        $this->payType = $payType;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAuthPath(): string
    {
        return $this->authPath;
    }

    /**
     * @param string $authPath
     */
    public function setAuthPath(string $authPath): void
    {
        $this->authPath = $authPath;
    }


}