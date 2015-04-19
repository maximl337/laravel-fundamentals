@extends('app')

@section('content')


        
        <div class="row">
            
            <div class="col-md-12">
                <h1> {{ $article->title }} </h1>            
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                
                

                   <p>
                       
                       {{ $article->body }}
                       
                   </p>
                
               

            </div>

            @unless ($article->tags->isEmpty())
            <div class="col-md-12">
              <h5>Tags:</h5>
              
              <ul>
                

              
              @foreach ($article->tags as $tag)

                <li>{{ $tag->name }}</li>
        
              @endforeach
          
              </ul>
            </div>
            @endunless

        </div>


    

@stop