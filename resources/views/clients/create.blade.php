<div>
        <h1>
            Ajouter  un nouvelle client
        </h1>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
 
        <form action="{{route('produits.store') }}" method="POST">
            @csrf
          
            <div>
                <label for="first_name">
                    Nom
                </label>
                <input type="text" name="nom" id="first_name"><br><br>
            </div>
            <div>
                <label for="last_name">
                    Prenom
                </label>
                <input type="text" name="prenom" id="last_name"><br><br>
            </div>
            <div>
                <label for="phone">
                    phone
                </label>
                <input type="text" name="telephone" id="phone"><br><br>
            </div>
            <div>
                <label for="city">
                    ville
                </label>
                <input type="text" name="ville" id="city"><br><br>
            </div>
            <div>
                <label for="birthday">
                    date_naissance
                </label>
                <input type="date" name="date_naissance" id="birthday"><br><br>
            </div>
            
            <input type="submit" value="Submit">
        </form>
    </div>
