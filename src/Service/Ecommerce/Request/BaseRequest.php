<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:13
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

abstract class BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway/InterfaceII';
}