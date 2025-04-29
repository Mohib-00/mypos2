<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrnAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_account_id',
        'vendor_net_amount',
        'discount',
    ];

    public function vendorAccount()
    {
        return $this->belongsTo(AddAccount::class, 'vendor_account_id');
    }
}

