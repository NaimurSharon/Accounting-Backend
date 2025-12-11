<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item'; // Assuming table name is 'item' based on 'item_code_id' typically mapping to Item model
    protected $guarded = [];
}
