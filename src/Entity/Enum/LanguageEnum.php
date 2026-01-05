<?php

namespace App\Enum;

enum LanguageEnum: string
{
    case ENGLISH = 'English';
    case FRANCAIS = 'Français';
    case ESPANOL = 'Español';
    case PORTUGUES = 'Português';
    case ARABIC = 'Arabic';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
