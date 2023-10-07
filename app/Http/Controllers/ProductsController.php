<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Models\sections;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all(); // Assurez-vous que le nom du modèle est correctement orthographié
        $sections = sections::all(); // Assurez-vous que le nom du modèle est correctement orthographié
    
        return view('products.products', compact('products', 'sections')); // Séparez les noms des variables par des virgules
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        products::create([
            'product_name' => $request->input('product_name'),
            'section_id' => $request->input('section_id'),
            'description' => $request->input('description'),
        ]);
    
        session()->flash('add', 'تم إنشاء المنتج بنجاح.');
        return redirect('/products');
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Vous pouvez obtenir l'ID de la section en recherchant la section par son nom
        $section = sections::where('section_name', $request->section_name)->first();
    
        if (!$section) {
            // Gérez le cas où la section n'existe pas
            return redirect('/products')->with('error', 'القسم غير موجود.');
        }
    
        // Ensuite, utilisez l'ID de la section pour mettre à jour le produit
        $product = products::findOrFail($request->id);
    
        $product->update([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'section_id' => $section->id, // Utilisez l'ID de la section trouvée
        ]);
    
        session()->flash('edit', 'تم تحديث المنتج بنجاح.');
        return redirect('/products');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $products = products::find($id);
        $products->delete();
        session()->flash('delete','تم حذف المنتج بنجاج');
        return redirect('/products');
    }
}
