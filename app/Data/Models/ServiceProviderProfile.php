<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderProfile extends Model
{
    use InsertOnDuplicateKey;

    protected $casts = [
        'attachments' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function totalFinishedJobs(): int
    {
        return $this->hasMany(JobBid::class, 'user_id', 'user_id')->where('status', JobBid::COMPLETED)
            ->where('user_id', $this->user_id)->count();
    }
}
