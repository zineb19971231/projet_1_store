<script src="https://cdn.tailwindcss.com"></script><div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Détails du produit N° {{$produit->id}}</h1>
    
    <div class="space-y-4">
        <div class="flex items-center space-x-2">
            <strong class="text-gray-600">Image:</strong>
            <img src="{{asset('storage/'.$produit->image)}}" alt="" width="100px">
        </div>
        
        <div class="flex items-center space-x-2">
            <strong class="text-gray-600">Nom:</strong>
            <span class="text-gray-800">{{$produit->nom}}</span>
        </div>

        <div class="flex items-center space-x-2">
            <strong class="text-gray-600">Prix:</strong>
            <span class="text-gray-800">{{$produit->prix}} €</span>
        </div>

        <div class="flex items-center space-x-2">
            <strong class="text-gray-600">Stock:</strong>
            <span class="text-gray-800">{{$produit->stock}}</span>
        </div>

        <div class="flex items-center space-x-2">
            <strong class="text-gray-600">Nom Catégorie:</strong>
            <span class="text-gray-800">{{$produit->categorie->nom}}</span>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{route('produits.index')}}" class="text-blue-500 hover:text-blue-700 font-medium">Retourner à la liste</a>
    </div>
</div>
