<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Order List</title>
</head>
@extends('layouts.admin');
@section('content');
<body class="bg-gray-100 font-sans">

    <div class="max-w-7xl mx-auto py-10 px-5">
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Nombre des Commandes section with border and centered -->
            <div class="border-2 border-green-700 rounded-lg p-4 mb-6 text-center bg-green-700 text-white">
                <p class="text-xl font-semibold">Nombre des Commandes: 
                    <span class="text-gray-200">{{ count($commande) }}</span>
                </p>
            </div>
            
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Order List</h1>

            <table class="min-w-full table-auto border-collapse bg-white rounded-lg overflow-hidden shadow-md">
                <thead>
                    <tr class="bg-green-800 text-white text-sm uppercase">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Client ID</th>
                        <th class="px-6 py-3 text-left">Date</th>
                        <th class="px-6 py-3 text-left">Amount</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($commande as $item)
                    <tr class="hover:bg-green-50">
                        <td class="px-6 py-4">{{ $item->id }}</td>
                        <td class="px-6 py-4">{{ $item->client_id }}</td>
                        <td class="px-6 py-4">{{ $item->date }}</td>
                        <td class="px-6 py-4">{{ $item->montant }}</td>
                        <td class="px-6 py-4 text-green-600">
                            <a href="{{ route('commandes.show', $item->id) }}" class="hover:underline">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection;
</body>
</html>
