<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lista extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['titulo', 'descricao', 'status'];

    protected $dates = ['deleted_at'];
}
