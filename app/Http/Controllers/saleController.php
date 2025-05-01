<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class saleController extends Controller
{
    public function  pos(){ 
        $user = Auth::user();
        $users= User::all();
        $customers = customer::all();
        $products = Product::all();
        return view('adminpages.pos', ['userName' => $user->name,'userEmail' => $user->email],compact('users','customers','products'));
      }

      public function getProductDetails($id)
      {
          $product = Product::findOrFail($id);
          return response()->json([
              'item_name' => $product->item_name,
              'retail_rate' => $product->retail_rate,
              'quantity' => $product->quantity // real stock
          ]);
      }
      

public function getCustomersByUsername($username)
{
    if ($username === '1') {
        $customers = Customer::all();
    } else {
        $customers = Customer::where('assigned_user_id', $username)->get();
    }

    return response()->json([
        'customers' => $customers,
        'fixed_discount' => $customers->first()?->client_fixed_discount ?? null,
    ]);
}

public function getCustomerDiscount($customerId)
{
    $customer = Customer::find($customerId);
    return response()->json([
        'fixed_discount' => $customer?->client_fixed_discount ?? null
    ]);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'employee' => 'nullable|string',
        'customer_name' => 'nullable|string',
        'created_at' => 'nullable|date',
        'ref' => 'nullable|string',
        'total_items' => 'nullable|integer',
        'total' => 'nullable|numeric',
        'sale_type' => 'required|string',
        'payment_type' => 'required|string',
        'discount' => 'nullable|numeric',
        'amount_after_discount' => 'nullable|numeric',
        'fixed_discount' => 'nullable|numeric',
        'amount_after_fix_discount' => 'nullable|numeric',
        'subtotal' => 'nullable|numeric',
        'items' => 'required|array', 
    ]);

    $sale = Sale::create($validated);

    foreach ($request->items as $item) {
        SaleItem::create([
            'sale_id' => $sale->id,
            'product_name' => $item['product_name'],
            'product_quantity' => $item['product_quantity'],
            'product_rate' => $item['product_rate'],
            'product_subtotal' => $item['product_subtotal'],
        ]);
    }

    return response()->json(['message' => 'Sale recorded successfully']);
}

}
