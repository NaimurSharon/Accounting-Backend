<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessStatementOfAccounts extends Model
{
    use HasFactory;

    protected $table = 'process_statement_of_accounts';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'frequency', // ENUM
        'company_id',
        'from_date',
        'to_date',
        'cost_center', // VARCHAR?
        'project', // VARCHAR?
        'customer_collection', // ENUM
        'collection_name',
        'account_id',
        'finance_book_id',
        'orientation', // ENUM
        'start_date',
        'currency_id',
        'include_ageing',
        'ageing_based_on', // ENUM
        'enable_auto_email',
        'primary_mandatory',
        'cc_to',
        'filter_duration',
        'customers',
        'subject',
        'body',
        'letter_head_id',
        'terms_and_conditions_id',
        'include_break',
        'show_net_values_in_party_account',
        'sender_id',
        'report', // ENUM
        'posting_date',
        'payment_terms_template_id',
        'sales_partner_id',
        'sales_person_id',
        'territory_id',
        'based_on_payment_terms',
        'pdf_name',
        'ignore_exchange_rate_revaluation_journals',
        'ignore_cr_dr_notes',
        'show_remarks',
        'categorize_by', // ENUM
        'show_future_payments',
        'print_format_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_date' => 'date',
        'to_date' => 'date',
        'start_date' => 'date',
        'posting_date' => 'date',
        'include_ageing' => 'boolean',
        'enable_auto_email' => 'boolean',
        'primary_mandatory' => 'boolean',
        'include_break' => 'boolean',
        'show_net_values_in_party_account' => 'boolean',
        'based_on_payment_terms' => 'boolean',
        'ignore_exchange_rate_revaluation_journals' => 'boolean',
        'ignore_cr_dr_notes' => 'boolean',
        'show_remarks' => 'boolean',
        'show_future_payments' => 'boolean',
    ];

    public function ccRelation()
    {
        return $this->hasMany(ProcessStatementOfAccountsCc::class, 'parent_id');
    }

    public function customersRelation()
    {
        return $this->hasMany(ProcessStatementOfAccountsCustomer::class, 'parent_id');
    }
}
