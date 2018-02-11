<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Section ;

class sectionController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = date('Y-m-d');
        $time = time('H:i:s');
      /*  $sections = ['History'=>'history.jpg' ,'Electrical'=>'electrical.jpg' ,
                     'Drawing'=>'drawing.jpg', 'Art'=>'art.png', 'Science'=>'science.jpg', 'Comic'=>'comic.jpg' , 'Short Story'=>'shortstory.jpg' , 'Civil'=>'civil.jpg'];
      */

       // $sections = DB::table('sections')->get();
        $sections = Section::all();
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

        //DB::table('sections')->insert(['section_name'=>$section_name , 'image_name'=>$filename]);
        //Section::insert(['section_name'=>$section_name , 'image_name'=>$filename]);

        $new_section =new Section;
        $new_section->section_name =$section_name;
        $new_section->image_name = $filename;
        $new_section->save();

        session()->push('m','sucess');
        session()->push('m','Section Created Successfully !!');

        return redirect('admin');

    }

    public function show($id)
    {
        $date = date('Y-m-d');
        $time = time('H:i:s');
        $section =Section::find($id);
       // $all_books = DB::table('sections')
       //     ->join('books', "sections.id" ,'=' , 'books.section_id')
       //     ->where('sections.id',$id)
       //     ->get();
        $all_books = $section->books;
        $array_of_authors =[];
        $i = 0;

        foreach ($all_books as $book) {
            $array_of_authors = array_add($array_of_authors, $i,
             //   DB::table("books")
             //       ->join("books_authors_relationship", "books.id", "=", "books_authors_relationship.book_id")
             //       ->join("authors", "books_authors_relationship.author_id", "=", "authors.id")
             //       ->where("books.id", $book->id)
             //       ->select("authors.first_name","authors.id")
             //       ->get()

            $book->authors()->select("authors.first_name","authors.id")->get()
            );

            $i++;
        }

        return view('libraryViewsContainer.books',compact('section' , $section , 'all_books' , $all_books,'array_of_authors',$array_of_authors),[ 'date' => $date , 'time' => $time  ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $section_name = $request->input('section_name');
        //DB::table('sections')->where('id',$id)->update(['section_name'=>$section_name]);
        // Section::where('id',$id)->update(['section_name'=>$section_name]);
        $section =Section::find($id);
        $section->section_name =$section_name;
        $section->save();
        session()->push('m','sucess');
        session()->push('m','Section Updated Successfully !!');
        return redirect('admin');

    }

    public function destroy($id)
    {
        //DB::table('sections')->where('id',$id)->delete();
        Section::destroy($id);
        session()->push('m','danger');
        session()->push('m','Section deleted temporary !!');
        return redirect('admin');
    }
    public function admin(){

        $date = date('Y-m-d');
        $time = time('H:i:s');
       // $sections =DB::table('sections')->get();
        $sections = Section::withTrashed()->get();
        return view('admin' , ['sections' => $sections , 'date' => $date , 'time' => $time  ]);
    }

    public function restore($id){
        $section =Section::onlyTrashed()->find($id);
        $section->restore();
        session()->push('m','info');
        session()->push('m','Section restored Successfully !!');
        return redirect('admin');
    }
    public function deleteForever($id){
        $section =Section::onlyTrashed()->find($id);
        $section->forceDelete();
        session()->push('m','danger');
        session()->push('m','Section deleted Successfully !!');
        return redirect('admin');
    }
}
