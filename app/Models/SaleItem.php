<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id', 'product_name', 'product_quantity', 'product_rate', 'product_subtotal',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class,'sale_id', 'id');
    }
}

