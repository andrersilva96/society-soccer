<?php

namespace App\Enums;

trait UsefulEnums
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array_flip(mixed $param = null): mixed
    {
        $data = array_flip(self::array());
        return $param ? $data[$param] : $data;
    }

    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }
}
