<?php 

namespace App\Models;

use App\Models\EloquentUser;
use App\Models\EloquentWordbook;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentFavorite extends Model
{
    protected $table = 'favorites';
    protected $fillable = [
        'user_id',
        'wordbook_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(EloquentUser::class);
    }

    public function wordbook(): BelongsTo
    {
        return $this->belongsTo(EloquentWordbook::class);
    }
}