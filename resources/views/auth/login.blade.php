@extends('layouts.public')

@section('content')

    <section class="register-form col-md-12">

        @include('partials.errors')

        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                {!! Form::model(['url' => 'login']) !!}

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

                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', false) !!} Remember me
                        </label>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                </div>


                {!! Form::close() !!}
            </div>
        </div>

    </section>

@endsection
