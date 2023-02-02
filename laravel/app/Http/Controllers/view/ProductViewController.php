<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class ProductViewController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('products', 'name')],
            'price' => 'required',
            'for_weather_forecasts' => 'required'
        ]);
        Product::create($formFields);
        return redirect('/')->with('message', 'Product created successfully!');
    }

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product) {
        $formFields = $request->validate([
            'name' => 'required', Rule::unique('products', 'name'),
            'price' => 'required',
            'for_weather_forecasts' => 'required'
        ]);
        $product->update($formFields);
        return back()->with('message', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/')->with('message', 'Product deleted successfully!');
    }

    public function recommended()
    {
        return view('products.recommended');
    }


    public function submit(Request $request)
    {
        $city = $request->input('city');
        $data = Cache::remember("{$city}", 300, function() use ($city) {
            $response = HTTP::GET("http://adeoweather.com:8666/api/products/recommended/{$city}");
            return json_decode($response);
        });
        return view('products.recommended', [ 'data' => $data ]);
    }
}
