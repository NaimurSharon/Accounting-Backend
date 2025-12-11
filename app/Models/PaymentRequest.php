<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;

    protected $table = 'payment_request';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'payment_request_type',
        'transaction_date',
        'naming_series',
        'mode_of_payment_id',
        'party_type_id',
        'party',
        'reference_doctype_id',
        'reference_name',
        'grand_total',
        'is_a_subscription',
        'currency_id',
        'subscription_plans',
        'bank_account_id',
        'bank_id',
        'bank_account_no',
        'account',
        'iban',
        'branch_code',
        'swift_number',
        'cost_center_id',
        'project_id',
        'print_format',
        'email_to',
        'subject',
        'payment_gateway_account_id',
        'status',
        'make_sales_invoice',
        'message',
        'mute_email',
        'payment_url',
        'payment_gateway',
        'payment_account',
        'payment_channel',
        'payment_order_id',
        'amended_from_id',
        'failed_reason',
        'outstanding_amount',
        'company_id',
        'party_account_currency_id',
        'party_name',
        'phone_number'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'transaction_date' => 'date',
        'grand_total' => 'decimal:2',
        'outstanding_amount' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
