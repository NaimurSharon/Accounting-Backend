<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'status', // ENUM
        'cancelation_date',
        'trial_period_start',
        'trial_period_end',
        'current_invoice_start',
        'current_invoice_end',
        'days_until_due',
        'cancel_at_period_end',
        'plans', // Child
        'apply_additional_discount', // ENUM
        'additional_discount_percentage',
        'additional_discount_amount',
        'party_type_id', // Link to DocType
        'party',
        'sales_tax_template_id',
        'purchase_tax_template_id',
        'follow_calendar_months',
        'generate_new_invoices_past_due_date',
        'end_date',
        'start_date',
        'cost_center_id',
        'company_id',
        'submit_invoice',
        'generate_invoice_at', // ENUM
        'number_of_days'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'cancelation_date' => 'date',
        'trial_period_start' => 'date',
        'trial_period_end' => 'date',
        'current_invoice_start' => 'date',
        'current_invoice_end' => 'date',
        'end_date' => 'date',
        'start_date' => 'date',
        'cancel_at_period_end' => 'boolean',
        'follow_calendar_months' => 'boolean',
        'generate_new_invoices_past_due_date' => 'boolean',
        'submit_invoice' => 'boolean',
        'additional_discount_percentage' => 'decimal:2',
        'additional_discount_amount' => 'decimal:2',
    ];

    public function plansRelation()
    {
        return $this->hasMany(SubscriptionPlanDetail::class, 'parent_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function scopePastDue($query)
    {
        return $query->where('status', 'Past Due');
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'party', 'name')->where('party_type_id', 'Customer'); // Simple hack, ideally dynamic
    }

    public function subscriber()
    {
        return $this->partyRelation();
    }

    public function partyRelation()
    {
        // Dynamic relationship
        return $this->morphTo(__FUNCTION__, 'party_type_id', 'party');
        // But party_type_id is typically "Customer", not "App\Models\Customer".
        // Use custom accessor if needed, or simple belongsTo if assumed only Customer usually. 
        // ERPNext Subscriptions valid for Customer, Supplier, Shareholder? Mostly Customer.
    }
}
