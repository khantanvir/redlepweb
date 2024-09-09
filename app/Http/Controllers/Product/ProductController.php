<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        $data['result'] = array(
            'key'=>200,
            'value'=>$products
        );
        return response()->json($data);
    }
}
