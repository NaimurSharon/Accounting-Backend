<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccountsImporter extends Model
{
    use HasFactory;

    protected $table = 'chart_of_accounts_importer';
    protected $guarded = [];
}
