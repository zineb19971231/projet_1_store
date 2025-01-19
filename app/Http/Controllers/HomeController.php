<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class HomeController extends Controller
{
    public function index(){
       $produits=Produit::all(['id','nom','prix','stock','image']);
       return view('home.index',compact('produits'));
    }

    // public function ajouter_panier(Request $request,String $id){
    //     $produits = Produit::findOrfail($id);
    //     $cart = session()->get(key:'cart',default:[]);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantite']++;
    //     }else{

    //     $cart[$id] = [
    //         'id' => $produits->id,
    //         'nom' => $produits->nom,
    //         'prix' => $produits->prix,
    //         'quantite' => 1,
    //         'image' => $produits->image,
    //           ];}

    //           session()->put("cart","$cart");
    //           return redirect()->back();

    //  }

}
