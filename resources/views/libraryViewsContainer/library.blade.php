@extends('master')
@section('content')

<div class="container" style="opacity:0.9">
    <div class="row">
        @foreach($sections as $section)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="public/images/{{$section->image_name}}" width="150" height="280">
                    <h1><a class="btn btn-primary">{{$section->section_name}}</a> </h1>
                </div>
            </div>

        @endforeach

    </div>
</div>

@stop
