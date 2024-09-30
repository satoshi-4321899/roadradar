<?php

namespace App\Enums;

enum ProductCategory: string
{
    case BIKES = 'bikes';
    case APPARELS = 'apparels';
    case ACCESSORIES = 'accessories';
    case SHOES = 'shoes';
    case BACKPACKS = 'backpacks';

    public static function random(): self
    {
        $cases = self::cases();
        return $cases[array_rand($cases)];
    }
}