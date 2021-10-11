<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();

        return Product::orderBy('id', 'desc')->paginate(25);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if($user->tokenCan("1")){

            $request->validate(array(
                'name' => 'required | min:5',
                'slug' => 'required',
                'price' => 'required'
            ));
            return Product::create($request->all());
        }else{
            return [
                'status' => 'Permission denied to create'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        if($user->tokenCan("1")){
            return Product::find($id);
        }else{
            return [
                'status' => 'Permission denied to create'
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if($user->tokenCan("1")){
        $product = Product::find($id);
        $product->update($request->all());
            return $product;
        }else{
            return [
                'status' => 'Permission denied to create'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        if($user->tokenCan("1")){
            return Product::destroy($id);
        }else{
            return [
                'status' => 'Permission denied to create'
            ];
        }
    }
}
