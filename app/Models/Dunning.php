<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dunning extends Model
{
    use HasFactory;

    protected $table = 'dunning';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'company_id',
        'naming_series',
        'customer_name',
        'posting_date',
        'dunning_type_id',
        'dunning_fee',
        'language_id',
        'letter_head_id',
        'amended_from_id',
        'body_text',
        'closing_text',
        'posting_time',
        'rate_of_interest',
        'address_display',
        'contact_display',
        'contact_mobile',
        'company_address_display',
        'contact_email',
        'customer_id',
        'grand_total',
        'status',
        'income_account_id',
        'overdue_payments',
        'total_interest',
        'total_outstanding',
        'customer_address_id',
        'contact_person_id',
        'dunning_amount',
        'cost_center_id',
        'spacer',
        'company_address_id',
        'currency_id',
        'conversion_rate',
        'base_dunning_amount'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'dunning_fee' => 'decimal:2',
        'rate_of_interest' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'total_interest' => 'decimal:2',
        'total_outstanding' => 'decimal:2',
        'dunning_amount' => 'decimal:2',
        'conversion_rate' => 'decimal:2',
        'base_dunning_amount' => 'decimal:2',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function dunningType()
    {
        return $this->belongsTo(DunningType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
