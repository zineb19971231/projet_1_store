<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Liste des Clients</title>
</head>

<body class="bg-gray-100 font-sans antialiased">
    @extends('layouts.admin');
    @section('content');
    <div class="container mx-auto px-6 py-10">
        <!-- Nombre de Clients Section -->
        <div class="max-w-3xl mx-auto p-6 bg-green-700 text-white rounded-lg shadow-lg mt-10 mb-8">
            <h2 class="text-2xl font-semibold">Nombre de Clients : <span class="text-gray-200">{{ count($clients) }}</span></h2>
        </div>

        <!-- Add New Client Button -->
        <div class="mb-8 text-center">
            <a href="{{ route('clients.create') }}" class="bg-green-700 text-white px-6 py-2 rounded-md text-lg hover:bg-green-600 transition duration-200">Ajouter un nouveau client</a>
        </div>

        <!-- Clients List Header -->
        <h1 class="text-3xl font-semibold text-center text-gray-700 mb-6">Liste des clients</h1>

        <!-- Clients Table -->
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white border-collapse">
                <thead>
                    <tr class="text-white bg-green-700">
                        <th class="py-3 px-4 text-left">Id</th>
                        <th class="py-3 px-4 text-left">Nom</th>
                        <th class="py-3 px-4 text-left">Prenom</th>
                        <th class="py-3 px-4 text-left">Téléphone</th>
                        <th class="py-3 px-4 text-left">Ville</th>
                        <th class="py-3 px-4 text-left">Date de naissance</th>
                        <th class="py-3 px-4 text-center" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-left">{{ $item->id }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->nom }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->prenom }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->telephone }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->ville }}</td>
                        <td class="py-3 px-4 text-left">{{ $item->date_naissance }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('clients.show', $item->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">Details</a>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('clients.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-200">Modifier</a>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('clients.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

</body>

</html>
