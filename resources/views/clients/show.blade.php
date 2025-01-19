<div>
        <h1>details de la categorie N° {{$client->id}}</h1>
        <p>
            <strong>Nom: </strong> {{$client->nom}}<br>
            <strong>Prenom : </strong> {{$client->prenom}}<br>
            <strong>Telephone : </strong> {{$client->telephone}}<br>
            <strong>ville : </strong> {{$client->ville}}<br>
            <strong>date_naissance : </strong> {{$client->date_naissance}}
        </p>
        <a href="{{route('clients.index')}}">Retourner à la liste</a></div>
</div>
