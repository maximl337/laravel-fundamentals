@extends('app')

@section('content')



        
        <div class="row">
           
        <div class="col-md-12">
            <h1>Edit: {!! $article->title !!} </h1>  
        </div>    
        


        <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                
                

            {!! Form::model( $article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
            

               @include ('articles._form', ['submitButtonText' => 'Update Article'])


            {!! Form::close() !!}

            @include ('errors.list')

            </div>

        </div>
  

    

@stop