<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/22
 * Time: 下午3:47
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

class Tx4600Request extends BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/Gateway4File/InterfaceII';
}