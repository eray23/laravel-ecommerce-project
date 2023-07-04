<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->returnUrl = "/products/{}/images";
        $this->fileRepo = "public/products";
    }

    public function index(Product $product)
    {
        return view("backend.images.index", ["product" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view("backend.images.insert_form", ["product"=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product, ProductImageRequest $request)
    {
        $productImage = new ProductImage();
        $data = $this->prepare($request, $productImage->getFillable());
        $productImage->fill($data);
        $productImage->save();

        $this->editReturnUrl($product->product_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, ProductImage $image)
    {
        return view("backend.images.update_form", ["product"=>$product, "image"=>$image]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageRequest $request, Product $product, ProductImage $image)
    {
        $data = $this->prepare($request, $image->getFillable());
        $image->fill($data);
        $image->save();

        $this->editReturnUrl($product->product_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductImage $image)
    {
        $image->delete();
        $filepath = $this->fileRepo . "/" . $image->image_url;

        if (Storage::disk("local")->exists($filepath)) {
            Storage::disk("local")->delete($filepath);
        }

        Alert::success('Ürün Resmi Silindi', 'Ürün Resmi Başarıyla silindi');
        return Redirect::to('/products');


    }

    private function editReturnUrl($id){
        $this->returnUrl = "/products/$id/images";
    }
}
