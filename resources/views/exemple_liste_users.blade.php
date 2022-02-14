@extends('model/ModeleSite')

@section('contenu')
    <h1>Les utilisateurs</h1>

    <ul>
        @foreach($utilisateurs as $utilisateur)
            <li>{{ $utilisateur->email }}</li>
        @endforeach
    </ul>
@endsection