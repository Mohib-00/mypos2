<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee', 'customer_name', 'created_at', 'ref', 'total_items', 'total',
        'sale_type', 'payment_type', 'discount', 'amount_after_discount', 'fixed_discount',
        'amount_after_fix_discount', 'subtotal',
    ];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class,'sale_id','id');
    }
}
