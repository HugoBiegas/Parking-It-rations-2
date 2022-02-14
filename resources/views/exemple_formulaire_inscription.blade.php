@extends('model/ModeleSite')

@section('contenu')
    <form action="/exemple_formulaire_inscription" method="post">
        {{ csrf_field() }}

        <input type="email" name="email" placeholder="Email">
        @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
        <input type="text" name="prénom" placeholder="prénom">
        <input type="text" name="nom" placeholder="nom">
        <input type="submit" value="M'inscrire">
    </form>
@endsection