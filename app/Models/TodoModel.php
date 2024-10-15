<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'priority'];

    protected $cast = ['title' => 'string', 'description' => 'string', 'priority' => 'integer',];
}
