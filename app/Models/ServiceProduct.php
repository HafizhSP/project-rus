<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation to table ServiceCategory
    public function serviceCategory()
    {
        return $this->belongsTo('App\Models\ServiceCategory');
    }

    // Relation to table ApiVendor
    public function apiVendor()
    {
        return $this->belongsTo('App\Models\ApiVendor');
    }
}
