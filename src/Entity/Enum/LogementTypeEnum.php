<?php

namespace App\Enum;

enum LogementTypeEnum: string
{
    case HOTEL = 'HOTEL';
    case APPARTEMENT = 'APPARTEMENT';
    case VILLA = 'VILLA';
    case AUBERGE = 'AUBERGE';
    case CAMPING = 'CAMPING';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }   
}
