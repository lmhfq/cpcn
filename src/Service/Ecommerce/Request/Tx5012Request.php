<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: lmh <lmh@weiyian.com>
 * Date: 2022/1/23
 * Time: 下午4:40
 */

namespace Lmh\Cpcn\Service\Ecommerce\Request;

class Tx5012Request extends BaseRequest
{
    /**
     * @var string
     */
    protected $uri = '/AggrateGateway/InterfaceI';

    protected $txCode = '5012';

    public function handle()
    {
        // TODO: Implement handle() method.
    }
}