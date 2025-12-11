<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequePrintTemplate extends Model
{
    use HasFactory;

    protected $table = 'cheque_print_template';
    protected $guarded = [];
}
