<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EloquentWordbook extends Model
{
    protected $table = 'wordbooks';
    protected $fillable = [
        'title',
        'user_id',
        'is_public',
    ];
}