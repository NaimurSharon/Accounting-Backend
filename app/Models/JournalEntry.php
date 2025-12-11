<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    use HasFactory;

    protected $table = 'journal_entry';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'title',
        'voucher_type',
        'naming_series',
        'posting_date',
        'company_id',
        'finance_book_id',
        'accounts',
        'cheque_no',
        'cheque_date',
        'user_remark',
        'total_debit',
        'total_credit',
        'difference',
        'multi_currency',
        'total_amount_currency_id',
        'total_amount',
        'total_amount_in_words',
        'clearance_date',
        'remark',
        'inter_company_journal_entry_reference_id',
        'bill_no',
        'bill_date',
        'due_date',
        'write_off_based_on',
        'write_off_amount',
        'pay_to_recd_from',
        'letter_head_id',
        'select_print_heading_id',
        'mode_of_payment_id',
        'payment_order_id',
        'is_opening',
        'stock_entry_id',
        'auto_repeat_id',
        'amended_from_id',
        'from_template_id',
        'tax_withholding_category_id',
        'apply_tds',
        'reversal_of_id',
        'process_deferred_accounting_id',
        'is_system_generated',
        'periodic_entry_difference_account_id',
        'for_all_stock_asset_accounts',
        'stock_asset_account_id',
        'party_not_required'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'posting_date' => 'date',
        'cheque_date' => 'date',
        'bill_date' => 'date',
        'due_date' => 'date',
        'clearance_date' => 'date',
        'total_debit' => 'decimal:2',
        'total_credit' => 'decimal:2',
        'difference' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'write_off_amount' => 'decimal:2',
        'is_opening' => 'boolean', // ENUM 'No', 'Yes' can be cast if we use accessor/mutator or custom cast, but mostly Laravel handles bool cast from 0/1. For 'Yes'/'No', we might need mutator.
        'apply_tds' => 'boolean',
        'multi_currency' => 'boolean',
        'is_system_generated' => 'boolean',
        'for_all_stock_asset_accounts' => 'boolean',
        'party_not_required' => 'boolean',
    ];

    // Accessor/Mutator for ENUM 'Yes'/'No' fields
    public function getIsOpeningAttribute($value)
    {
        return $value === 'Yes';
    }

    public function setIsOpeningAttribute($value)
    {
        $this->attributes['is_opening'] = $value ? 'Yes' : 'No';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function financeBook()
    {
        return $this->belongsTo(FinanceBook::class); // Placeholder needed?
    }

    public function totalAmountCurrency()
    {
        return $this->belongsTo(Currency::class, 'total_amount_currency_id');
    }

    public function accountsRelation()
    {
        return $this->hasMany(JournalEntryAccount::class, 'parent_id');
    }

    public function interCompanyJournalEntryReference()
    {
        return $this->belongsTo(JournalEntry::class, 'inter_company_journal_entry_reference_id');
    }

    public function letterHead()
    {
        return $this->belongsTo(LetterHead::class); // Placeholder needed?
    }

    public function modeOfPayment()
    {
        return $this->belongsTo(ModeOfPayment::class);
    }

    public function paymentOrder()
    {
        return $this->belongsTo(PaymentOrder::class);
    }

    public function stockEntry()
    {
        return $this->belongsTo(StockEntry::class); // Placeholder needed?
    }

    public function autoRepeat()
    {
        return $this->belongsTo(AutoRepeat::class); // Placeholder needed?
    }

    public function amendedFrom()
    {
        return $this->belongsTo(JournalEntry::class, 'amended_from_id');
    }

    public function fromTemplate()
    {
        return $this->belongsTo(JournalEntryTemplate::class, 'from_template_id');
    }

    public function taxWithholdingCategory()
    {
        return $this->belongsTo(TaxWithholdingCategory::class);
    }

    public function reversalOf()
    {
        return $this->belongsTo(JournalEntry::class, 'reversal_of_id');
    }

    public function periodicEntryDifferenceAccount()
    {
        return $this->belongsTo(Account::class, 'periodic_entry_difference_account_id');
    }

    public function stockAssetAccount()
    {
        return $this->belongsTo(Account::class, 'stock_asset_account_id');
    }
}
