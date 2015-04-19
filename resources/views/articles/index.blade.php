@extends('app')

@section('content')


        
        <div class="row">
            
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h1> Articles </h1>  
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ action('ArticlesController@create') }}" class="btn btn-primary">Add article</a>
                    </div>
                </div>
                          
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                
                @foreach($articles as $article)

                    <article>
                        <a href="{{ action('ArticlesController@show', $article->id) }}">
                            <h2>{{ $article->title }}</h2>
                        </a>
                        <div class="body">{{ $article->body }}</div>

                    </article>
                
                @endforeach

            </div>

        </div>
    

@stop