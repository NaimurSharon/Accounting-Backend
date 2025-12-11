<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterHead extends Model
{
    use HasFactory;

    protected $table = 'letter_head'; // Assuming table is letter_head (common in ERPNext) but valid check: journal_entry has letter_head_id
    protected $guarded = [];
}
