<?php
namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
class CategorieController extends Controller
{
    
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

   
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
        {
            $request->validate([
                'nom'=> 'required|unique:categories,nom'
            ]);
            Categorie::create($request->all());
            return redirect()->route('categories.index');          
        }
        
    public function show(string $id)
    {
        $categorie = Categorie::find($id);
        return view('categories.show', compact('categorie'));
    }


    public function edit(string $id)
    {
        $categorie = Categorie::find($id);
        return view('categories.edit', compact('categorie'));
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom'=> 'required|unique:categories,nom, '
        ]);
        $categorie = Categorie::find($id);
        $categorie->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $deleted = Categorie::destroy($id);
       if ($deleted > 0){
        return response()->json(
            [
                'ok'=>true,
                'message'=>"La categorie ayant l'id est supprimé avec succés",
    
            ], 202
        );
       }
       return response()->json([
        'ok'=>false,
        'message'=>"Aucune categorie supprimée",
    ], 404);
    }
}
