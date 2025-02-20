<?php

namespace App\Enums;

use Filament\Support\Contracts\{HasColor, HasLabel, HasIcon};

enum SourceType: string implements HasLabel
{
    case LOCAL = 'local';
    case YOUTUBE = 'youtube';

    public function getLabel(): string
    {
        return match ($this) {
            self::LOCAL => 'Local',
            self::YOUTUBE => 'YouTube',
        };
    }
}
