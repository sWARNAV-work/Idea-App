<?php

declare(strict_types=1);

namespace App;

enum IdeaStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'Fabricating',
            self::COMPLETED => 'Fabricated',
            
        };
    }

    public static function values()
    {
        return array_map(fn ($status) => $status->value, self::cases());
    }
}
