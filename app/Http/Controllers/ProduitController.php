<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    
    public function index()
    {
        $categories = Categorie::all();
        $produits=Produit::with('categorie')->get();
        return view('produits.index',compact('produits', 'categories'));
    }


    public function create()
    {
        $categories=Categorie::all();
        return view('produits.create',compact('categories'));
    }

   

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom'=>'required|string',
            'prix'=>'required',
            'stock'=>'required|numeric',
            'description'=>'required|string',
            'categorie_id'=>'required|exists:categories,id',

            'image'=> 'required',  // Règle pour l'image
        ]);
    
        // Vérification de l'image et stockage si elle existe
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products/images', 'public');
            $validatedData['image'] = $imagePath; // Ajout du chemin de l'image dans les données validées
        }
       
        Produit::create($validatedData);
        return redirect()->route('produits.index');
    }

   


    public function show(string $id)
    {
    $produit=Produit::find($id);
    return view('produits.show',compact('produit'));
    }

 

    
    public function edit(string $id)
    {
        $produit=Produit::find($id);
        $categories=Categorie::all();
        return view('produits.edit',compact('produit','categories'));
    }

   
    public function update(Request $request, string $id)
    {  
       $validatedData= $request->validate([
            'nom'=>'required' ,
            'prix'=>'required' ,
            'stock'=>'required' ,
            'description'=>'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
           
        if ($request->hasFile('image'))
         { $imagePath = $request->file('image')->store('products/images', 'public');
             $validatedData['image'] = $imagePath; 
            }
           
        $produit = Produit::find($id);
        
        $produit->update($validatedData);
        // dd($produit);
        return redirect()->route('produits.index');
    }

   
    public function destroy(string $id)
    {
        Produit::destroy($id);
        return redirect()->route('produits.index');
    }

    public function filter(Request $request){
        $categories = Categorie::all();
        if($request->categorie_id == "-1"){
            $produits = Produit::with('categorie')->get();
        }else{
            $produits = Produit::with('categorie')->where('categorie_id', $request->categorie_id)->get();
        }
        return view('produits.index', compact('produits', 'categories'));
    }
}
