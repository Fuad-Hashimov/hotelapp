<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    use HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'work',
        'customers_id'
    ];

    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
