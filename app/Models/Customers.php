<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'lastname',
        'sales'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function works()
    {
        return $this->hasMany(Works::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
