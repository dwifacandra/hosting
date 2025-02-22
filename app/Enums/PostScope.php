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

    public static function toArray(): array
    {
        return [
            self::POST->value => self::POST->getLabel(),
            self::ANIMATION->value => self::ANIMATION->getLabel(),
            self::VIDEO->value => self::VIDEO->getLabel(),
            self::PHOTOGRAPH->value => self::PHOTOGRAPH->getLabel(),
            self::DESIGN->value => self::DESIGN->getLabel(),
        ];
    }
}
