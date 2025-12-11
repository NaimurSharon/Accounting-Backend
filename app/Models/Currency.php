<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currency';

    const CREATED_AT = 'creation';
    const UPDATED_AT = 'modified';

    protected $guarded = [];
}
