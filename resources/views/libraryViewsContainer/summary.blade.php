@extends('master')
@section('content')

    <div class="container" >
        <h1 class="well text-center">Library Summary</h1>
        <table class="table">
            <tr>
                <th style="width: 25%">Section Name</th>
                <th style="width: 25%">Book title</th>
                <th style="width: 25%">Book Description</th>
                <th style="width: 25%">Authors</th>
            </tr>
            @foreach($results as $bookModel)
                <tr>
                    <td>
                        <a href="/library/{{$bookModel->section->id}}">
                           <span class="label label-info">{{$bookModel->section->section_name}}</span>
                        </a>
                    </td>
                    <td>
                        {{$bookModel->book_title}}
                    </td>
                    <td>
                        {{$bookModel->book_description}}
                    </td>
                    <?php $authors = $bookModel->authors; ?>
                    <td>
                        @foreach($authors as $author)
                            <a href="/authors/{{$author->id}}">
                                <span class="label label-danger">{{$author->first_name}} {{$author->last_name}}</span>
                            </a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop