<?php

namespace App;

enum IdeaStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';

    public function label (): string
    {
        return match ($this) {
            self::PENDING => 'The Job is Pending',
            self::COMPLETED => 'This Job is Done',
            self::IN_PROGRESS => 'This Job is Still Going On'
        };
    }
}
