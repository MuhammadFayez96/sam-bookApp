@extends('master')
@section('content')

    <div class="container" >
        <div class="panel panel-default">
           <div class="panel-heading">Managing Sections</div>
           <div class="panel-body">
               <h2>Creating New Section</h2><hr/>

            {{--   <form action="library" method="post" enctype="multipart/form-data">
                   {!! csrf_field() !!}
                   Enter The Name Of The Section : <input type="text" name="section_name"/>  <br/>
                   Upload the image : <input type="file" name="image">  <br/>
                   <button class="btn btn-default" type="submit"/>
                   <img src="{{asset('public/images/add.png')}}" width="25px" height="25px"/>Create
                   <a/>
               </form>   --}}


               {!! Form::open(["url" => "library" , "files" => "true"]) !!}
               Enter The Name Of The Section : {!! Form::text("section_name") !!} <br/>
               Upload the image : {!! Form::file("image") !!}  <br/>
               {!! Form::submit("Create" , ["class" =>"btn btn-info"]) !!}
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
                @if($section->trashed())
                    <tr style="background-color: #ca2125"></tr>
                @else
                    <tr style="background-color: #fff"></tr>
                @endif

                <tr>



             {{--  <form action="library/{{$section->id}}/" method="post">
                   {!! csrf_field() !!}
                   <input type="hidden" name="_method" value="PATCH"/>
                   <td>
                       <input type="text" name="section_name" value="{{$section->section_name}}">
                   </td>
                   <td>
                       <span class="label label-default">{{$section->books_total}}</span>
                   </td>
                   <td>
                       <img src="{{asset('public/images/update.jpg')}}" width="25px" height="25px" onclick="submit()">
                   </td>
               </form>   --}}

               {!! Form::open(["url" => "admin/update/sections/".$section->id, "method" =>"post"]) !!}
               <input type="hidden" value="{{$section_id}}">
               <td>{!! Form::text("section_name" , $section->section_name) !!}</td>
               <td>
                   <span class="label label-default">{{$section->books_total}}</span>
               </td>
               <td>
                   {!! Form::submit("Update" , ["class" =>"btn btn-sucess"]) !!}
               </td>
               {!! Form::close() !!}

               <td>
                  {{-- <form action="library/{{$section->id}}/" method="post">
                       {!! csrf_field() !!}
                       <input type="hidden" name="_method" value="DELETE">
                       <img src="{{asset('public/images/delete.png')}}" width="25px" height="25px" onclick="submit()">
                   </form>  --}}

                  <!--     ........................ Deleting a Section ....................   -->

               @if($section->trashed())
                   <td>
                       {!! Form::open(["url" => "admin/delete-forever/".$section->id  , "method" =>"post"]) !!}
                       <input type="hidden" value="{{$section_id}}">
                   <td> {!! Form::submit("Delete forever!!" , ["class" =>"btn btn-danger"]) !!} </td>
                   {!! Form::close() !!}
                   </td>

               @else
                   <td>
                       {!! Form::open(["url" => "admin/delete/sections/".$section->id  , "method" =>"post"]) !!}
                       <input type="hidden" value="{{$section_id}}">
                   <td> {!! Form::submit("Delete" , ["class" =>"btn btn-danger"]) !!} </td>
                   {!! Form::close() !!}
                   </td>
               @endif

               @if($section->trashed())
                   <td>
                       {!! Form::open(["url" => "admin/restore/".$section->id , "method" =>"post"]) !!}
                       <input type="hidden" value="{{$section_id}}">
                   <td> {!! Form::submit("Restore" , ["class" =>"btn btn-default"]) !!} </td>
                   {!! Form::close() !!}
                   </td>
               @endif

           </tr>

        @endforeach
        </table>
        @endif
        </div>
    </div>

@stop
