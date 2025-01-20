<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nos Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans  leading-normal tracking-normal p-0">

    {{-- @extends('layouts.admin')
    @section('content') --}}

    <main class="ml-0 p-6">
        <div class="flex justify-between items-center p-16 mb-4">
    
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 font-semibold underline">
                Back to Dashboard
            </a>
            <h1 class="text-xl font-semibold text-gray-800 border border-green-500 px-3 py-2 rounded">
                NOS PRODUITS
            </h1>
           
        </div>
        
        
   
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-6">
        
        @foreach($produits as $produit)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                <!-- Product Image -->
                <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover">
                
                <!-- Product Details -->
                <div class="p-4">
                    <!-- Product Name -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $produit->nom }}</h3>
    
                    <!-- Product Description -->
                    <p class="text-gray-600 text-sm mb-4">{{ $produit->description }}</p>
    
                    <!-- Product Price -->
                    <div class="text-lg font-bold text-green-500 mb-4">${{ $produit->prix }}</div>
    
                    <!-- Add to Cart Button -->
                    <form action="{{ route('panier.add', $produit->id) }}" method="get">
                        @csrf
                        <button type="submit" 
                        class="w-full py-2 bg-green-600 text-white rounded-lg hover:bg-green-500 transition-colors duration-300" 
                        >
                            AJOUTER AU PANIER
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</main>
    {{-- @endsection    --}}

</body>
</html>
