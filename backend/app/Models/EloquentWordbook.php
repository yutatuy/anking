<?php 

namespace App\Models;

use App\Models\EloquentUser;
use App\Models\EloquentWord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentWordbook extends Model
{
    protected $table = 'wordbooks';
    protected $fillable = [
        'title',
        'user_id',
        'is_public',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(EloquentUser::class);
    }

    public function words(): HasMany
    {
        return $this->hasMany(EloquentWord::class);
    }
}