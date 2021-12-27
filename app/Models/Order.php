<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation to table ServiceProduct
    public function serviceProduct()
    {
        return $this->belongsTo('App\Models\ServiceProduct');
    }

    // Relation to table User
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
