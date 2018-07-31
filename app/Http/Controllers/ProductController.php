<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('.product.list')->with('product', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.product.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = Input::get('name');
        $products->category_id = Input::get('category_id');
        $products->description = Input::get('description');
        $products->price = Input::get('price');
        $products->image= Input::get('image');
        $products->save();
        return redirect('/product/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        return view('.product.list', ['product', $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        if($products == null){
            return 'Danh mục không tồn tại hoặc đã bị xoá.';
        }
        return view('.product.edit')->with('product', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if($products == null){
            return 'Sản phẩm không tồn tại hoặc đã bị xóa';
        }
        $products->name = Input::get('name');
        $products->category_id = Input::get('category_id');
        $products->description = Input::get('description');
        $products->price = Input::get('price');
        $products->image = Input::get('image');
        $products.save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if($products == null){
            return 'Sản phẩm đã xóa hoặc không tồn tại';
        }
        $products.delete();
        return response('delete', '/404');
    }
}
