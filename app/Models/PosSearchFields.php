<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosSearchFields extends Model
{
    use HasFactory;

    protected $table = 'pos_search_fields';
    protected $guarded = [];
}
