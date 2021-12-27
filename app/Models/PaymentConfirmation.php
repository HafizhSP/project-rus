<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Cast to Array
    protected $casts = [
        'data' => 'array',
    ];

    // Relation to table Bank
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }
}
