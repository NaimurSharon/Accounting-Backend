<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTermsTemplate extends Model
{
    use HasFactory;

    protected $table = 'payment_terms_template';

    protected $fillable = [
        'name',
        'creation',
        'modified',
        'modified_by',
        'owner',
        'docstatus',
        'idx',
        'template_name',
        'terms', // deprecated or simple text?
        'allocate_payment_based_on_payment_terms'
    ];

    protected $casts = [
        'creation' => 'datetime',
        'modified' => 'datetime',
        'allocate_payment_based_on_payment_terms' => 'boolean',
    ];

    public function details()
    {
        return $this->hasMany(PaymentTermsTemplateDetail::class, 'parent_id');
    }
}
