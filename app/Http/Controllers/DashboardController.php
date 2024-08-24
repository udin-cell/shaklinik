<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        $items = TransactionItem::with('product')->count();
        return view('pages.dashboard.index', compact('products', 'items'));
    }
}
