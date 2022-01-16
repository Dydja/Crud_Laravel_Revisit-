<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Voir la liste de tout les produits
        $product = Product::all();
        return view('product.index',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //Affiche le formulaire d'ajout
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,)
    {
        //Traitement des informations lors de l'ajout des informations
        $request->validate([
            'name' =>'required',
            'price'=>'required|integer',
            'description' =>'required'
        ]);

       $product= new Product;
       $product->name = $request->name;
       $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
      //  return dd($product);
        return redirect()->route('product.index')->with("success","Etudiant ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id,$product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // affiche le formulaire de modification
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Mise à jour des informations a la suite de la modification
        $request->validate([
            'name'=>'required',
            'price'=>'required|integer',
            'description'=>'required'
        ]);


        $product->name =  $request->name;
        $product->price = $request->price;
        $product->description = $request->description ;
        $product->save();
        return redirect()->route('product.index')->with("success","Mise à jour effectuée avec succès");;

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $nom_complet = $product->name;
        //Suppresion de l'element
        $product->delete();
        return back()->with("successDelete","L'etudiant(e) $nom_complet a été supprimé avec succès");
    }
}
