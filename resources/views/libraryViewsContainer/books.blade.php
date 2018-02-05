@extends('master')
@section('content')

    <div class="container" >
        <h1>{{$section->section_name}}</h1> <br/>

        {!! Form::open(["url" => "books"]) !!}
        {!! Form::hidden("section_id",$section->id) !!}
        <tr>
            <td>Enter the title of the book :</td>
            <td>{!! Form::text("book_title") !!}</td>
        </tr>
        <tr>
            <td>Enter the edition number :</td>
            <td>{!! Form::text("book_edition") !!}</td>
        </tr>
        <tr>
            <td>Describe the book :</td>
            <td>{!! Form::textarea("book_description") !!}</td>
        </tr>
        <tr>
            <td>{!! Form::submit("Create" , ["class" =>"btn btn-info"]) !!}</td>
        </tr>
        {!! Form::close() !!}

        <table class="table">
            <tr>
                <th><h3>Book Title</h3></th>
                <th><h3>Book Edition</h3></th>
                <th><h3>Book Description</h3></th>
                <th></th>
                <th></th>
            </tr>

            @foreach($all_books as $book)
                <tr>
                    <td>{{$book->book_title}}</td>
                    <td>{{$book->book_edition}}</td>
                    <td>{{$book->book_description}}</td>
                    <td><a href="#">Update</a> </td>
                    <td><a href="#">Delete</a> </td>
                </tr>
            @endforeach

        </table>

    </div>

@stop