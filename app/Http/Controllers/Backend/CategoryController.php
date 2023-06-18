<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/categories";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("backend.categories.index", ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.categories.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $data =$this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();

        Alert::html("Kategori Eklendi", "{{$category->name}} kategori başarıyla eklendi.", "success");

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("backend.categories.update_form", ["category" => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $data =$this->prepare($request, $category->getFillable());
        $category->fill($data);
        $category->save();
        Alert::success('Kategori Güncellendi', 'Kategori bilgileri başarıyla güncellendi.');
        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Alert::success('Kategori Silindi', 'Kategori Başarıyla silindi');
        return Redirect::to($this->returnUrl);

    }
}
