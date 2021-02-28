<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class invoices extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'invoice_Date',
        'Due_date',
        'product',
        'section_id',
        'Amount_collection',
        'Amount_Commission',
        'Discount',
        'Value_VAT',
        'Rate_VAT',
        'Total',
        'Status',
        'Value_Status',
        'name',
        'email',
        'note',
        'Payment_Date',
        'Created',
    ];

    protected $dates = ['deleted_at'];

    public function section()
    {
    return $this->belongsTo('App\sections');
    }
    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
