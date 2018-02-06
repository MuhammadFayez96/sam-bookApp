@extends('master')
@section('content')

    <div class="container" >
        <h1>{{$section->section_name}}</h1> <br/>
        <table class="table">
        {!! Form::open(["url" => "books"]) !!}
        {!! Form::hidden("section_id",$section->id) !!}
        <tr>
            <td style="font-size: 20px">Enter the title of the book :</td>
            <td >{!! Form::text("book_title") !!}</td>
        </tr>
        <tr>
            <td style="font-size: 20px">Enter the edition number :</td>
            <td>{!! Form::text("book_edition") !!}</td>
        </tr>
        <tr>
            <td style="font-size: 20px">Describe the book :</td>
            <td>{!! Form::textarea("book_description") !!}</td>
        </tr>
        <tr>
            <td style="font-size: 20px">Another Author :</td>
            <td>{!! Form::text("another_author") !!}</td>
        </tr>
        <tr>
            <td>{!! Form::submit("Add" , ["class" =>"btn btn-info"]) !!}</td>
        </tr>
        {!! Form::close() !!}
        </table>

        <table class="table">
            <tr>
                <th><h3>Book Title</h3></th>
                <th><h3>Book Edition</h3></th>
                <th><h3>Book Description</h3></th>
                <th></th>
                <th></th>
            </tr>


            <?php $i=0;  ?>
            @foreach($all_books as $book)
                <tr>
                {!!Form::open(["url"=>"books/update/".$book->id , "method"=>"post"])!!}
                {!! Form::hidden("section_id",$section->id) !!}
                    <td>{!! Form::text("book_title" , $book->book_title)!!}</td>
                    <td>{!! Form::text("book_edition" , $book->book_edition)!!}</td>
                    <td>{!! Form::textarea("book_description" , $book->book_description , ["rows"=>3,"cols"=>25])!!}</td>
                    <td>
                        <?php $authors = $array_of_authors[$i];  ?>
                        @foreach($authors as $author)
                                <a href="/authors/{{$author->id}}" ><span class="label label-info">{{$author->first_name}}</span></a>
                        @endforeach
                        <?php $i =$i+1; ?>
                    </td>
                    <td>{!! Form::submit("Update" , ["class"=>"btn btn-sucess"]) !!} </td>
                {!! Form::close() !!}
                    <td>
                        {!!Form::open(["url"=>"books/delete/".$book->id , "method"=>"post"])!!}
                    {!! Form::hidden("section_id",$section->id) !!}
                    {!! Form::submit("Delete" , ["class"=>"btn btn-danger"]) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

@stop