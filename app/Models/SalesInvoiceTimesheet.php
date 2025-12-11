<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceTimesheet extends Model
{
    use HasFactory;

    protected $table = 'sales_invoice_timesheet';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'parent',
        'parentfield',
        'parenttype',
        'parent_id',
        'time_sheet_id',
        'billing_hours',
        'billing_amount',
        'timesheet_detail',
        'activity_type_id',
        'description',
        'from_time',
        'to_time',
        'project_name'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'from_time' => 'datetime',
        'to_time' => 'datetime',
        'billing_hours' => 'decimal:2',
        'billing_amount' => 'decimal:2',
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(SalesInvoice::class, 'parent_id');
    }
}
