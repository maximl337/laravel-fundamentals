@extends('app')

@section('content')




    <h1>About Angad</h1>


    <h3>People I like: </h3>
    <ul>
        @foreach($people as $person)

        <li>{{ $person }}</li>

        @endforeach
    </ul>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis repudiandae architecto iure, quisquam saepe libero harum possimus expedita facere alias velit nihil laborum similique explicabo maxime fugiat voluptatum atque iusto.</p>
@stop