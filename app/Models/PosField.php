<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosField extends Model
{
    use HasFactory;

    protected $table = 'pos_field';
    protected $guarded = [];
}
