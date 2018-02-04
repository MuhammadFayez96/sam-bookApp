@extends('master')
@section('content')

    <div class="container" >
        <div class="panel panel-default">
           <div class="panel-heading">Managing Sections</div>
           <div class="panel-body">
               <h2>Creating New Section</h2><hr/>




               <form action="library" method="post" enctype="multipart/form-data">
                   {!! csrf_field() !!}
                   Enter The Name Of The Section : <input type="text" name="section_name"/>  <br/>
                   Upload the image : <input type="file" name="image">  <br/>
                   <button class="btn btn-default" type="submit"/>
                   <img src="{{asset('public/images/add.png')}}" width="25px" height="25px"/>Create
                   <a/>
               </form>
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



               <form action="library/{{$section->id}}/" method="post">
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
               </form>



               <td>
                   <form action="library/{{$section->id}}/" method="post">
                       {!! csrf_field() !!}
                       <input type="hidden" name="_method" value="DELETE">
                       <img src="{{asset('public/images/delete.png')}}" width="25px" height="25px" onclick="submit()">
                   </form>
               </td>

           </tr>

        @endforeach
        </table>
        @endif
        </div>
    </div>

@stop
