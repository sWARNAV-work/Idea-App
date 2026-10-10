<?php

declare(strict_types=1);

namespace App\Models;

use App\IdeaStatus;
use Database\Factories\IdeaFactory;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Idea extends Model
{
    /** @use HasFactory<IdeaFactory> */
    use HasFactory;

    protected $attributes = [                   // Assigning an initial value to 'status'
        'status' => IdeaStatus::PENDING->value,  // Getting the Value of the enum rather than the enum itself
    ];

    public static function getStatusCounts(User $user): Collection
    {
        $statusIdea = $user->ideas()->selectRaw('status, count(*) as count')->groupBy('status')->pluck('count', 'status');
        // return $statusIdea;

        return collect(IdeaStatus::cases())
            ->mapWithKeys(fn ($status) => [$status->value => $statusIdea->get($status->value, 'NaN')])
            ->put('all', $user->ideas()->count());

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    protected function casts(): array
    {
        return [
            'links' => AsArrayObject::class,        // Links the JSON files to be used as arrayOBJ
            'status' => IdeaStatus::class,          // The String type status is typecasted to enum IdeaStatus
        ];
    }
}
