@extends('layouts.public')

@section('content')

<section class="register-form col-md-12">

    @include('partials.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
            {!! Form::model(['url' => 'register']) !!}

            <div class="form-group row {{ ($errors->first('name')) ? 'has-error'  :''}}">
                {!!Form::label('name','Name', ['class' => 'col-md-4 control-label'])!!}
                <div class="col-md-6">
                    {!!Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Your name...'])!!}
                </div>
            </div>

            <div class="form-group row {{ ($errors->first('email')) ? 'has-error'  :''}}">
                {!!Form::label('email','Email', ['class' => 'col-md-4 control-label'])!!}
                <div class="col-md-6">
                    {!!Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your_email@whatever.com'])!!}
                </div>
            </div>

            <div class="form-group row {{ ($errors->first('password')) ? 'has-error'  :''}}">
                {!!Form::label('password','Password', ['class' => 'col-md-4 control-label'])!!}
                <div class="col-md-6">
                    {!!Form::password('password',['class' => 'form-control'])!!}
                </div>
            </div>

            <div class="form-group row">
                {!!Form::label('password_confirmation','Password confirmation', ['class' => 'col-md-4 control-label'])!!}
                <div class="col-md-6">
                    {!!Form::password('password_confirmation',['class' => 'form-control'])!!}
                </div>
            </div>

            <div class="col-md-12 text-center">
                {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>

</section>

@endsection
