<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Product;
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



}
