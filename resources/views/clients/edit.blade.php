<div>
        <h1>Modifier la client ayant l'id N° {{$client->id}}</h1>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{route('clients.update', $client->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="first_name">First Name :</label><br>
                <input type="text" id="first_name" name="nom" value="{{$client->nom}}"><br><br>
            </div>
            <div>
                <label for="last_name">Last Name :</label><br>
                <input type="text" id="last_name" name="prenom" value="{{$client->prenom}}"><br><br>
            </div>
            <div>
                <label for="phone">Phone :</label><br>
                <input type="text" id="phone" name="telephone" value="{{$client->telephone}}"><br><br>
            </div>
            <div>
                <label for="city"> City :</label><br>
                <input type="text" id="city" name="ville" value="{{$client->ville}}"><br><br>
            </div>
            <div>
                <label for="birthday"> Birthday :</label><br>
                <input type="date" id="birthday" name="date_naissance" value="{{$client->date_naissance}}"><br><br>
            </div>
           
            <input type="submit" value="Modifier">
    </div>
