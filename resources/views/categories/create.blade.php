<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajouter une nouvelle catégorie</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter une nouvelle catégorie :</h1>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-6">
            <ul>
                @foreach($errors->all() as $error)
                <li>• {{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('categories.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
          
            <div class="mb-6">
                <label for="nom" class="block text-gray-700 font-medium">Nom :</label>
                <input type="text" name="nom" id="nom"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Entrez le nom de la catégorie">
            </div>
            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-medium">Description :</label>
                <textarea name="description" id="description" cols="30" rows="5"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Entrez la description de la catégorie"></textarea>
            </div>

            <div>
                <button type="submit"
                    class="w-full py-3 bg-green-700 text-white font-semibold rounded-md shadow-md hover:bg-green-500 transition duration-200">
                    Ajouter la catégorie
                </button>
            </div>
        </form>
    </div>
</body>

</html>
