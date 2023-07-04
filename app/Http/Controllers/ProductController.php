<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Repositories\CartRepository;

use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()
            ->whereActive(true)
            ->paginate(20)
            ;
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
            $validator = $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:1',
            'description' => 'required|string|min:10',
            'image' => 'required|image:jpg,jpeg,png',
        ],
        [
             'name.min' => 'Le nom du produit est trop court',
            'price.min' => 'Le prix ne peut etre moins de 1',
            'description.min' => 'La description est trop courte',
        ]);

        $file=$request->file("image");
        $fileName= "images/".date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images'), $fileName);
    try{
        Product::create([
            'name' => $validator['name'],
            'price' => $validator['price'],
            'description' => $validator['description'],
            'image' => $fileName,
            'slug' => Str::slug($request->name),
            'active' => true,
        ]);
            return redirect()->route('products.admin')->with('success', 'Nouveau produit ajouté !');
        } catch (\Exception $e) {
            return redirect()->back()->with('echec', "Echec lors de l'ajout du nouveau produit...");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (File::exists($product->image)) {
            File::delete($product->image);
        }
            $product->delete();
         return redirect()->route('products.admin')->with('success', "Produit ".$product->name." supprimé !");
   }
}