<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $fillable = [
        'city',
        'country',
        'customers_id'
    ];

    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
