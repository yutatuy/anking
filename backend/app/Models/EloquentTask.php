<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EloquentTask extends Model
{
  protected $table = 'tasks';
  protected $fillable = ['name', 'user_id'];
}