<?php


namespace App\Services\Enum;


class DiskConfigService
{
    private const DISK = 'storage';

    public function getDisk()
    {
        return self::DISK;
    }
}
