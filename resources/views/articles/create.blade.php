@extends('app')

@section('content')


        <div class="row">
            
            <div class="col-md-12">
                <h1> Create an article </h1>            
            </div>

            <div class="col-md-12">
                <hr />
            </div>

            <div class="col-md-12">
                
                

            {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}

                @include ('articles._form', ['submitButtonText' => 'Add Article'])


            {!! Form::close() !!}

            @include ('errors.list')

            </div>
            
            

        </div>


    

@stop