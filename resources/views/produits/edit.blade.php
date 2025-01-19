<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Modifier le Produit</title>
</head>

<body class="bg-gray-50 font-sans">
   

    <div class="max-w-3xl mx-auto bg-white p-8 mt-10 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modifier le Produit ayant l'id N° {{$produit->id}}</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Veuillez corriger les erreurs suivantes :</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('produits.update', $produit->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-4">
                <label for="image" class="block text-lg font-medium text-gray-700">image :</label>
            <img src="{{asset('storage/'.$produit->image)}}" alt="" width="100px">

                <input type="file" id="image" name="image" value='' accept="images/*"
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-lg font-medium text-gray-700">Nom :</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $produit->nom) }}"
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <label for="prix" class="block text-lg font-medium text-gray-700">Prix :</label>
                <input type="text" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}"
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label for="stock" class="block text-lg font-medium text-gray-700">Stock :</label>
                <input type="text" id="stock" name="stock" value="{{ old('stock', $produit->stock) }}"
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Description :</label>
                <textarea name="description" id="description" cols="30" rows="6" value=""
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    {{ old('description', $produit->description) }}</textarea>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="categorie_id" class="block text-lg font-medium text-gray-700">Catégorie :</label>
                <select name="categorie_id"
                    class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id}}" {{$produit->categorie_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit"
                    class="px-6 py-2 w-full bg-yellow-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Modifier
                </button>
            </div>
        </form>
    </div>

</body>

</html>
