<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="bg-green-50 pt-8 mt-4">
@extends('layouts.admin')
@section('content')
<div class="bg-green-50 h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold mb-6 text-green-600">Shopping Cart</h1>
            <div class="flex">
                <!-- Formulaire pour vider le panier -->
                <form action="{{ route('panier.clearPanier') }}" method="get">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-white-600 text-red-600 rounded-lg hover:bg-red-500 transition-colors duration-300">
                        Vider le Panier
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold text-green-600">Produit</th>
                                <th class="text-left font-semibold text-green-600">Prix</th>
                                <th class="text-left font-semibold text-green-600">Quantité</th>
                                <th class="text-left font-semibold text-green-600">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $item)
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 mr-4" src="{{ asset('storage/' . $item->image) }}" alt="{{$item->nom}} image" />
                                            <span class="font-semibold text-green-800">{{$item->nom}}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 text-green-700">{{$item->prix}}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <form action="{{route('panier.decrement', $item->id)}}" method="POST">
                                                @csrf
                                                  
                                                <button class="border border-green-300 text-green-600 rounded-md py-2 px-4 mr-2 hover:bg-green-100">-</button>
                                            </form>
                                            <span class="text-center w-8 text-green-700">{{$panier[$item->id]}}</span>
                                            <form action="{{route('panier.increment', $item->id)}}" method="POST">
                                                @csrf
                                                <button class="border border-green-300 text-green-600 rounded-md py-2 px-4 ml-2 hover:bg-green-100">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="py-4 text-green-700">{{$item->prix * $panier[$item->id]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sidebar with summary and links -->
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <h2 class="text-lg font-semibold mb-4 text-green-600">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Totale</span>
                        <span class="text-green-700">{{$total}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span class="text-green-700">{{$total * 0.2}}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Livraison</span>
                        <span class="text-green-700">$0.00</span>
                    </div>
                    <hr class="my-2" />
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-green-600">Total</span>
                        <span class="font-semibold text-green-600">{{$total * 1.2}}</span>
                    </div>
                    <button class="bg-green-500 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-green-600">Payer</button>
                </div>

                <!-- Links with the same style -->
                <div class="flex justify-between mt-6">
                    <a href="{{ route('commandes.index') }}" class="hover:bg-green-200 text-green-600 p-2 rounded transition duration-300">Commandes</a>
                    <a href="{{ route('panier.index') }}" class="hover:bg-green-200 text-green-600 p-2 rounded transition duration-300">
                        <span class="material-symbols-outlined text-green-600 text-3xl">shopping_basket</span> Panier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
