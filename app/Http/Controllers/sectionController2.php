<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sectionController2 extends Controller
{
    public function index()
    {
        $date = date('Y-m-d');
        $time = time('H:i:s');
      /*  $sections = ['History'=>'history.jpg' ,'Electrical'=>'electrical.jpg' ,
                     'Drawing'=>'drawing.jpg', 'Art'=>'art.png', 'Science'=>'science.jpg', 'Comic'=>'comic.jpg' , 'Short Story'=>'shortstory.jpg' , 'Civil'=>'civil.jpg'];
      */

        $sections = DB::table('sections')->get();
        return view('libraryViewsContainer.library')->withDate($date)->withTime($time)->withSections($sections);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $section_name = $request->input('section_name');
        $file =$request->file('image');
        $destinationpath ='public/images';
        $filename = $file->getClientOriginalName();
        $file->move($destinationpath,$filename);

        DB::table('sections')->insert(['section_name'=>$section_name , 'image_name'=>$filename]);
        return redirect('admin');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function updateSection(Request $request, $id)
    {
        $section_name = $request->input('section_name');
        DB::table('sections')->where('id',$id)->update(['section_name'=>$section_name]);
        return redirect('admin');

    }

    public function destroySection($id)
    {
        DB::table('sections')->where('id',$id)->delete();
        return redirect('admin');
    }
    public function admin(){

        $date = date('Y-m-d');
        $time = time('H:i:s');
        $sections =DB::table('sections')->get();
        return view('admin' , ['sections' => $sections , 'date' => $date , 'time' => $time  ]);
    }
}
