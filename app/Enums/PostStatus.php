<?php

namespace App\Enums;

use Filament\Support\Contracts\{HasColor, HasLabel, HasIcon};

enum PostStatus: string implements HasLabel, HasIcon, HasColor
{
    case DRAFT = 'draft';
    case PUBLISH = 'publish';
    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISH => 'Publish',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::DRAFT => 'secondary',
            self::PUBLISH => 'success',
        };
    }
    public function getIcon(): string
    {
        return match ($this) {
            self::DRAFT => 'outline.lock',
            self::PUBLISH => 'outline.public',
        };
    }
}
