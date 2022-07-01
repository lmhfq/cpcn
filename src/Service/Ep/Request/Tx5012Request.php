<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Ep\Request;

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