<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\book;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function ()use ($request){

        $author_id = 1;
        $another_author = $request->another_author;
        $author2 = DB::table("authors")
                           ->where("first_name",$another_author)
                           ->select("id")
                           ->first();

        $book_title=$request->book_title;
        $book_edition=$request->book_edition;
        $book_description=$request->book_description;
        $section_id=$request->section_id;
        $id_book=DB::table("books")
                          ->insertGetId(["book_title"=>$book_title ,
                                         "book_edition"=>$book_edition,
                                         "book_description"=>$book_description,
                                         "section_id"=>$section_id
            ]);

        if ($author2 != null) {
            $author2_id = $author2->id;
            DB::table("books_authors_relationship")
                ->insert([
                    ["book_id" => $id_book, "author_id" => $author_id],
                    ["book_id" => $id_book, "author_id" => $author2_id]
                ]);
        }else{
            DB::table("books_authors_relationship")
                ->insert(["book_id" => $id_book, "author_id" => $author_id]);

        }
        });
        $section_id=$request->section_id;
        return redirect('library/'.$section_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $book_title=$request->book_title;
        $book_edition=$request->book_edition;
        $book_description=$request->book_description;
        $section_id=$request->section_id;
        DB::table("books")
            ->where("id",$id)
            ->update(["book_title"=>$book_title ,
                "book_edition"=>$book_edition,
                "book_description"=>$book_description,
            ]);

        return redirect('library/'.$section_id);

    }

    public function destroy(Request $request,$id)
    {
        $section_id=$request->section_id;
        DB::table("books")->where("id",$id)->delete();
        return redirect('library/'.$section_id);

    }

    public function summary(){
        $date = date('Y-m-d');
        $time = time('H:i:s');
        $results = book::with('section')->with('authors')->get();
        return view('summary',compact('results',$results),['date' => $date , 'time' => $time  ]);
    }
}
