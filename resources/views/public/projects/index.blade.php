@extends('layouts.public')

@section('content')

    @include('partials.message')
    @include('partials.errors')


<section class="projects">
    {{--@foreach($projects as $project)--}}
        {{--{{ $project->title }}--}}
    {{--@endforeach--}}
</section>

@endsection
