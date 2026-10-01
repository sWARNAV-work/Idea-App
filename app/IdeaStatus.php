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
            self::PENDING => 'This Bitch is Pending',
            self::COMPLETED => 'This Bitch is Done',
            self::IN_PROGRESS => 'This Bitch is Still Going'
        };
    }
}
