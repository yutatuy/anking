<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentUserPlay extends Model
{
    protected $table = 'user_plays';
    protected $fillable = [
        'user_id',
        'count',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}