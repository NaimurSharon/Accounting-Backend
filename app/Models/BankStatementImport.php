<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankStatementImport extends Model
{
    use HasFactory;

    protected $table = 'bank_statement_import';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'company_id',
        'bank_account_id',
        'bank_id',
        'import_file',
        'template_options',
        'status',
        'template_warnings',
        'show_failed_logs',
        'google_sheets_url',
        'reference_doctype_id',
        'import_type',
        'submit_after_import',
        'mute_emails',
        'custom_delimiters',
        'delimiter_options',
        'use_csv_sniffer',
        'import_mt940_fromat'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'show_failed_logs' => 'boolean',
        'submit_after_import' => 'boolean',
        'mute_emails' => 'boolean',
        'custom_delimiters' => 'boolean',
        'use_csv_sniffer' => 'boolean',
        'import_mt940_fromat' => 'boolean',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
