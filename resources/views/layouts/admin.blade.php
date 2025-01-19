<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_basket" /><!-- Intégration de la police Poppins -->
</head>
<body class="bg-gray-100 font-poppins leading-normal tracking-normal"> <!-- Application de la police Poppins -->

    {{-- @if(session('message'))
    <div class="bg-green-500 text-green p-4 rounded mb-4">
        {{ session('message') }}
    </div>
@endif --}}

    <nav class="bg-gradient-to-r from-green-300 via-beige-200 to-gray-400 text-white p-4 shadow-lg fixed w-full top-0 left-0 z-10">
        <div class="flex items-center justify-between">
            <div class="text-3xl font-semibold">Tableau de Board</div>
            <div class="flex space-x-6 text-lg">
                <!-- Home Link with Icon -->
                <a href="{{ route('home.index') }}" class="flex items-center hover:bg-green-500 p-2 rounded transition duration-300">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2 7 7 7-7 2 2M5 12h14v9H5z" />
                    </svg>
                    Home
                </a>
                <!-- Clients Link -->
                <a href="{{ route('clients.index') }}" class="hover:bg-green-500 p-2 rounded transition duration-300">
                    Clients
                </a>
                <!-- Produits Link -->
                <a href="{{ route('produits.index') }}" class="hover:bg-green-500 p-2 rounded transition duration-300">
                    Produits
                </a>
                <!-- Categories Link -->
                <a href="{{ route('categories.index') }}" class="hover:bg-green-500 p-2 rounded transition duration-300">
                    Categories
                </a>
                <!-- Commandes Link -->
                <a href="{{ route('commandes.index') }}" class="hover:bg-green-500 p-2 rounded transition duration-300">
                    Commandes  </a>

             <a href="{{ route('panier.index') }}" class="hover:text-gray-200">
    <span class="material-symbols-outlined text-4xl">
        shopping_basket
    </span>
</a>

              
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        @yield('content') <!-- This is where the product table will be injected -->
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-green-300 via-beige-200 to-gray-400 text-white py-4 mt-8">
        <div class="text-center">
            <p>&copy; 2025 Tableau de Board. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
