<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\EloquentWordbook;

class EloquentUser extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function wordbooks(): HasMany
    {
        return $this->hasMany(EloquentWordbook::class);
    }

    public function getJWTIdentifier()
    {
        // JWT トークンに保存する ID を返す
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // JWT トークンに埋め込む追加の情報を返す
        return [];
    }
}