<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter un produit</h1>

    @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-md mb-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="images/*">
        </div>
        <div class="mb-6">
            <label for="nom" class="block text-gray-700 font-medium">Nom :</label>
             <input type="text" name="nom" id="nom" 
                class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Entrez le nom du produit">
        </div>

        <div class="mb-6">
            <label for="prix" class="block text-gray-700 font-medium">Prix :</label>
            <input type="text" name="prix" id="prix" 
                class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Entrez le prix du produit">
        </div>

        <div class="mb-6">
            <label for="stock" class="block text-gray-700 font-medium">Stock :</label>
            <input type="text" name="stock" id="stock" 
                class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Entrez la quantité en stock">
        </div>

        <div class="mb-6">
            <label for="desc" class="block text-gray-700 font-medium">Description :</label>
            <input type="text" name="description" id="desc" 
                class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Entrez une description du produit">
        </div>

        <div class="mb-6">
            <label for="categorie_id" class="block text-gray-700 font-medium">Catégorie :</label>
            <select name="categorie_id" id="categorie"
                class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Sélectionnez une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" 
                class="w-full py-3 bg-green-700 text-white font-semibold rounded-md shadow-md hover:bg-green-00 transition duration-200">
                Ajouter le produit
            </button>
        </div>
    </form>
</div>
</body>
</html>