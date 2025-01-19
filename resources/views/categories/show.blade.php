<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Détails de la catégorie</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Détails de la catégorie N° {{$categorie->id}}</h1>

        <div class="text-gray-700 text-lg mb-6">
            <p>
                <strong class="font-medium text-gray-800">Nom : </strong> {{$categorie->nom}}
            </p>
        
            <p>
                <strong class="font-medium text-gray-800">Description : </strong> {{$categorie->description}}
            </p>
        </div>

        <a href="{{route('categories.index')}}"
            class="inline-block text-white bg-green-700 hover:bg-blue-700 px-6 py-3 rounded-md shadow-md transition duration-200">
            Retourner à la liste
        </a>
    </div>

</body>

</html>
