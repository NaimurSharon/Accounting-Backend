<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsoaCostCenter extends Model
{
    use HasFactory;

    protected $table = 'psoa_cost_center';
    protected $guarded = [];
}
