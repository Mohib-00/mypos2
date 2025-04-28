<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class grnController extends Controller
{
    public function openGRN(){ 
        $user = Auth::user();      
        $purchases = Purchase::where('stock_status', 'pending')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('adminpages.grn', ['userName' => $user->name,'userEmail' => $user->email],compact('purchases'));
    }

    public function getPurchaseDetails($id)
    {
        $purchase = Purchase::find($id);
    
        if (!$purchase) {
            return response()->json(['error' => 'Purchase not found'], 404);
        }
    
        $productIds = json_decode($purchase->products, true);
    
        $productNames = Product::whereIn('id', $productIds)->pluck('item_name', 'id');
    
        $productNamesArray = $productNames->toArray();
    
        return response()->json([
            'id' => $purchase->id,
            'vendors' => $purchase->vendors,
            'invoice_no' => $purchase->invoice_no,
            'receiving_location' => $purchase->receiving_location,
            'created_at' => $purchase->created_at,
            'remarks' => $purchase->remarks,
            'total_quantity' => $purchase->total_quantity,
            'gross_amount' => $purchase->gross_amount,
            'discount' => $purchase->discount,
            'net_amount' => $purchase->net_amount,
            'products' => $purchase->products,
            'quantity' => $purchase->quantity,
            'price' => $purchase->price,
            'retail_rate' => $purchase->retail_rate,
            'wholesale_rate' => $purchase->wholesale_rate,
            'mini_whole_rate' => $purchase->mini_whole_rate,
            'type_a_rate' => $purchase->type_a_rate,
            'type_b_rate' => $purchase->type_b_rate,
            'type_c_rate' => $purchase->type_c_rate,
            'amount' => $purchase->amount,
            'product_names' => $productNamesArray,
        ]);
    }

    
}
