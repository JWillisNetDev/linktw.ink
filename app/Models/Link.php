<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @property string $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 * @property string $slug
 * @property string $dest_url
 * @property int $clicks
 * @property ?int $created_by_id
 * @property ?User $created_by
 */
class Link extends Model
{
    use HasTimestamps, SoftDeletes;

    protected $fillable = [
        'dest_url',
    ];

    /**
     * @return BelongsTo<User|null>
     */
    public function created_by(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function getIsAnonymousAttribute(): bool
    {
        return $this->created_by_id === null;
    }

    public static function generateUniqueSlug(): string
    {
        $slug = Str::random(12);

        while (self::where('slug', $slug)->exists()) {
            $slug = Str::random(12);
        }

        return $slug;
    }
}
