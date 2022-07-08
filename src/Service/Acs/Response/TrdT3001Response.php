<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Service\Acs\Response;

class TrdT3001Response extends TrdBaseResponse
{

    public function handle(string $message)
    {
        parent::process($message);
    }
}