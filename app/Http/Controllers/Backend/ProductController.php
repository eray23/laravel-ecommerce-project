<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/products";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all()->where("is_active", true);
        return view("backend.products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::all();
        return view("backend.products.insert_form", ["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $product = new Product();
        $data =$this->prepare($request, $product->getFillable());
        $product->fill($data);
        $product->save();

        Alert::html("Ürün Eklendi", "{{$product->name}} ürünü başarıyla eklendi.", "success");

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("backend.products.update_form", ["product" => $product, "categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data =$this->prepare($request, $product->getFillable());
        $product->fill($data);

        $product->save();
        Alert::success('Ürün Güncellendi', 'Ürün bilgileri başarıyla güncellendi.');
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Alert::success('Ürün Silindi', 'Ürün Başarıyla silindi');
        return Redirect::to($this->returnUrl);

    }
}
