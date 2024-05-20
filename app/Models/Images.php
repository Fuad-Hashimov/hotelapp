<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'customer_images';

    protected $fillable = [
        'file_name',
        'file_path',
        'customers_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
