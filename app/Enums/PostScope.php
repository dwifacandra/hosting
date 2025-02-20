<?php

namespace App\Enums;

use Filament\Support\Contracts\{HasColor, HasLabel, HasIcon};

enum PostScope: string implements HasLabel
{
    case POST = 'post';
    case ANIMATION = 'animation';
    case VIDEO = 'video';
    case PHOTOGRAPH = 'photograph';
    case DESIGN = 'design';

    public function getLabel(): string
    {
        return match ($this) {
            self::POST => 'Post',
            self::ANIMATION => 'Animation',
            self::VIDEO => 'Video',
            self::PHOTOGRAPH => 'Photograph',
            self::DESIGN => 'Design',
        };
    }
}
