<?php
declare(strict_types=1);


namespace Lmh\Cpcn\Support;


trait ArrayTrait
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}