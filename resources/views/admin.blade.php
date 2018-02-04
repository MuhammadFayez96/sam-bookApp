@extends('master')
@section('content')

    <div class="container" >
        <div class="panel panel-default">
           <div class="panel-heading">Managing Sections</div>
           <div class="panel-body">
               <h2>Creating New Section</h2><hr/>



               {!! Form::open(["url" => "library" , "files" => "true"]) !!}
               Enter The Name Of The Section : {!! Form::text("section_name") !!} <br/>
               Upload the image : {!! Form::file("image") !!}  <br/>
               {!! submit("Create" , ["class" =>"btn btn-info"]) !!}
               {!! Form::close() !!}

           </div>


    @if($sections != null)
        <table class="table">
           <tr>
               <th><h3>Section Name</h3></th>
               <th><h3>Total books</h3></th>
               <th><h3>Update</h3></th>
               <th><h3>Delete</h3></th>
           </tr>
           @foreach($sections as $section )

           <tr>


    <!--     ........................ Updating a Section ....................   -->

               {!! Form::open(["url" => "{{url('admin/update/sections'.$section->id)}}" , "method" =>"post"]) !!}
               <input type="hidden" value="{{$section_id}}">
               <td>{!! Form::text("section_name" , $section->section_name) !!}</td>
               <td>
                   <span class="label label-default">{{$section->books_total}}</span>
               </td>
               <td>
               {!! submit("Update" , ["class" =>"btn btn-sucess"]) !!}
               </td>
               {!! Form::close() !!}


           <!--     ........................ Deleting a Section ....................   -->

               <td>


               {!! Form::open(["url" => "{{url('admin/delete/sections'.$section->id)}}" , "method" =>"post"]) !!}
                <input type="hidden" value="{{$section_id}}">
               <td> {!! submit("Delete" , ["class" =>"btn btn-danger"]) !!} </td>
               {!! Form::close() !!}
               </td>
           </tr>

        @endforeach
        </table>
        @endif
        </div>
    </div>

@stop
