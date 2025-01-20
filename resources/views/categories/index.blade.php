<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Liste des catégories</title>
</head>

<body class="bg-gray-100 font-sans text-gray-900">
    <div class="container mx-auto p-8">
        <!-- Lien Back to Dashboard -->
        <div class="w-full flex flex-col justify-start items-start mb-6">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 font-semibold mb-4 underline">
                Back to Dashboard
            </a>
        </div>
    
        <!-- Section du titre Liste des catégories -->
        <div class="max-w-3xl mx-auto p-6 bg-green-700 text-white rounded-lg shadow-lg mt-10 mb-8 text-align-center">
            <h2 class="text-2xl font-semibold">Liste des catégories</h2>
        </div>
    
        <!-- Bouton Ajouter une nouvelle catégorie -->
        <div class="mb-8 flex justify-center">
            <a href="{{ route('categories.create') }}" class="inline-block bg-green-700 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-green-500 transition duration-300 transform hover:scale-105">
                Ajouter une nouvelle catégorie
            </a>
        </div>
    </div>
    

        <!-- Title -->
        <h1 class="text-1xl font-semibold text-center text-green-700 mb-6">Nombre de Categories : <span class="text-green-700">{{ count($categories) }}</span></h1>
       
        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">Id</th>
                        <th class="px-6 py-3 text-left">Nom</th>
                        <th class="px-6 py-3 text-left">Description</th>
                        <th class="px-6 py-3 text-center" colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $item)
                    <tr id="categorie-row-{{$item->id}}" class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-3">{{ $item->id }}</td>
                        <td class="px-6 py-3">{{ $item->nom }}</td>
                        <td class="px-6 py-3">{{ $item->description }}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('categories.show', $item->id) }}" class="text-green-600 hover:text-green-800 transition duration-200">Détails</a>
                        </td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('categories.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-200">Modifier</a>
                        </td>
                        <td class="px-6 py-3 text-center">
                            <button type="button" id="deleteConfirm" data-id="{{$item->id}}" 
                                class="text-red-500 hover:text-red-700 transition duration-200 delete-btn" 
                                onclick="deleteItem({{$item->id}})">Supprimer</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function deleteItem(id) {
            if (confirm(`Voulez-vous supprimer la catégorie numéro ${id} ?`)) {
                fetch(`/categories/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'x-csrf-token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.ok) {
                        throw new Error(data.message);}
                    document.getElementById('categorie-row-' + id).remove();})
                .catch(error => {
                    console.error('Erreur:', error.message); });
                      }
                                 }
    </script>
{{-- @endsection --}}
</body>

</html>
