<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\EloquentWordbook;

class EloquentWord extends Model
{
    protected $table = 'words';
    protected $fillable = [
        'wordbook_id',
        'front_content',
        'back_content',
    ];

    public function wordbook(): BelongsTo
    {
        return $this->belongsTo(EloquentWordbook::class);
    }

}