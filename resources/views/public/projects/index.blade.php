@extends('layouts.public')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
@endif


<section class="projects">
    {{--@foreach($projects as $project)--}}
        {{--{{ $project->title }}--}}
    {{--@endforeach--}}
</section>

@endsection
