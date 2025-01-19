<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body class="bg-gray-100 font-poppins min-h-screen flex items-center justify-center">

    <!-- Conteneur avec flex pour ajouter le lien et centrer le contenu -->
    <div class="w-full flex justify-between items-start px-10 py-6">
        <!-- Lien Back to Dashboard à droite -->
        <a href="{{ route('dashboard') }}" class="text-green-500 hover:text-green-700 font-semibold">
            Back to Dashboard
        </a>
    </div>

    <div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">

        <div class="max-w-3xl mx-auto p-6 bg-green-700 text-white rounded-lg shadow-lg mt-10 mb-8">
            <h2 class="text-2xl font-semibold">Nombre de Produits : <span class="text-gray-200">{{ count($produits) }}</span></h2>
        </div>

        <div class="mb-8 flex justify-center">
            <a href="{{ route('produits.create') }}" class="inline-block bg-green-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-700 transition duration-300 transform hover:scale-105">
                Ajouter un nouveau produit
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-center text-green-700 mb-6">Liste des produits</h1>

        <div class="flex justify-between items-center mb-6">
            <form action="{{route('produits.filter')}}" id="filterCategorie" class="flex space-x-4">
                <select name="categorie_id" id="categorie_id" class="py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">
                    <option value="-1">Tous les Catégories</option>
                    @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}" @if(request('categorie_id') == $categorie->id) selected @endif>{{$categorie->nom}}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm text-gray-700">
                        <th class="px-4 py-2 border-b">Id</th>
                        <th class="px-4 py-2 border-b">Image</th>
                        <th class="px-4 py-2 border-b">Nom</th>
                        <th class="px-4 py-2 border-b">Prix</th>
                        <th class="px-4 py-2 border-b">Stock</th>
                        <th class="px-4 py-2 border-b">Description</th>
                        <th class="px-4 py-2 border-b">Catégorie</th>
                        <th class="px-4 py-2 border-b" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $item)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $item->id }}</td>
                        <td class="border border-gray-300 px-4 py-2"><img src="{{ asset('storage/'.$item->image) }}" width="100px" height="100px" alt=""></td>
                        <td class="px-4 py-2 border-b">{{ $item->nom }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->prix }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->stock }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->description }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->categorie->nom }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('produits.show', $item->id) }}" class="text-blue-600 hover:text-blue-800">Details</a>
                        </td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('produits.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">Modifier</a>
                        </td>
                        <td class="px-4 py-2 border-b">
                            <form action="{{route('produits.destroy',$item->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script>
    let filterCategorie = document.getElementById('filterCategorie');
    filterCategorie.addEventListener('change', function(){
        filterCategorie.submit();
    })
</script>
