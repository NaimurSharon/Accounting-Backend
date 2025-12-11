<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoRepeat extends Model
{
    use HasFactory;

    protected $table = 'auto_repeat';
    protected $guarded = [];
}
