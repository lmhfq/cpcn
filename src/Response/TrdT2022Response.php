<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Response;

class TrdT2022Response extends TrdBaseResponse
{
    public function handle(string $message)
    {
        parent::process($message);
    }
}