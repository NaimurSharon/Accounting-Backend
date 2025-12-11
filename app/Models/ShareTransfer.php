<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareTransfer extends Model
{
    use HasFactory;

    protected $table = 'share_transfer';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'transfer_type', // ENUM
        'date',
        'from_shareholder_id',
        'from_folio_no',
        'equity_or_liability_account_id', // Account
        'asset_account_id', // Account
        'to_shareholder_id',
        'to_folio_no',
        'share_type_id',
        'from_no',
        'rate',
        'no_of_shares',
        'to_no',
        'amount',
        'company_id',
        'remarks',
        'amended_from_id'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'date' => 'date',
        'rate' => 'decimal:2',
        'amount' => 'decimal:2',
        'no_of_shares' => 'decimal:2', // Added cast
    ];

    public function fromShareholder()
    {
        return $this->belongsTo(Shareholder::class, 'from_shareholder_id');
    }

    public function toShareholder()
    {
        return $this->belongsTo(Shareholder::class, 'to_shareholder_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function shareType()
    {
        return $this->belongsTo(ShareType::class);
    }
}
