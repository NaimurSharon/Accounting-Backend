<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceBook extends Model
{
    use HasFactory;

    protected $table = 'finance_book';
    protected $guarded = [];
}
