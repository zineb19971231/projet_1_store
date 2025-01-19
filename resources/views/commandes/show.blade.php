<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Order Details</title>
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-5xl mx-auto py-12 px-6 bg-white shadow-lg rounded-lg mt-8">
        <!-- Order Details Header -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Order Details: #{{$commande->id}}</h1>

        <!-- Order Information -->
        <div class="text-lg text-gray-700 mb-8">
            <p><strong class="font-semibold text-green-700">Client ID:</strong> {{$commande->client_id}}</p>
            <p><strong class="font-semibold text-green-700">La Date:</strong> {{$commande->date}}</p>
            <p><strong class="font-semibold text-green-700">Le Montant:</strong> {{$commande->montant}} €</p>
        </div>

        <!-- Back to Orders Button -->
        <a href="{{route('commandes.index')}}" class="text-blue-600 hover:text-blue-800 font-semibold mb-6 inline-block">
            &larr; Back to Orders List
        </a>

        <!-- Products Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto text-sm text-gray-700">
                <thead class="bg-green-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">ID Produit</th>
                        <th class="px-6 py-3 text-left">Nom Produit</th>
                        <th class="px-6 py-3 text-left">Prix</th>
                        <th class="px-6 py-3 text-left">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commande->produits as $item)
                    <tr class="border-t hover:bg-green-50">
                        <td class="px-6 py-4">{{ $item->id }}</td>
                        <td class="px-6 py-4">{{ $item->nom }}</td>
                        <td class="px-6 py-4">{{ $item->prix }} €</td>
                        <td class="px-6 py-4">{{ $item->pivot->qte }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
