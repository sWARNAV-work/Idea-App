<?php

declare(strict_types=1);

namespace App;

enum IdeaStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Fabrication-Pending',
            self::COMPLETED => 'Fabricated',
            self::IN_PROGRESS => 'Fabricating'
        };
    }

    public static function values()
    {
        return array_map(fn ($status) => $status->value, self::cases());
    }
}
