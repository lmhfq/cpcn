<?php
declare(strict_types=1);


namespace Cpcn\Response;

class TrdT3001Response extends TrdBaseResponse
{

    public function handle(string $message)
    {
        parent::process($message);
    }
}