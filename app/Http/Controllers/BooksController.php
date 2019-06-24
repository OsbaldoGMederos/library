<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DB;

use App\Book;
use App\Category;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('sortBy'))
        {
            $books = Book::orderBy(request('sortBy'), 'asc')->paginate(7);
        }
        else
        {
            $books = Book::orderBy('name', 'asc')->paginate(7);
        }

        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('books.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'author' => 'required'
        ]);


        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->category_id = $request->input('category');
        $book->published_date = $request->input('published_date');
        $book->user = 'No User';
        $book->save();

        return redirect('/books')->with('success', 'Book created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if($book) {
            $category = Category::find($book->category_id);
            return view('books.show')->with(['book' => $book, 'category' => $category]);
        }
        else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if($book) {
            $category = Category::find($book->category_id);
            $categories = Category::orderBy('name')->get();
            return view('books.edit')->with(['book' => $book, 'category' => $category, 'categories' => $categories]);
        }
        else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'published_date' => 'required',
            'author' => 'required'
        ]);

        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->published_date = $request->input('published_date');
        $book->category_id = $request->input('category');
        $book->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('success', 'Book removed');
    }


    /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function linkUser(Request $request, $id) {
        $book = Book::find($id);
        $book->user = $request->input('user');
        $book->save();
        return redirect('/books');
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setAsAvailable(Request $request, $id) {
        $book = Book::find($id);
        $book->user = 'No User';
        $book->save();
        return redirect('/books');
    }

    /**
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request) {
        $bookName = strtoupper($request->input('search'));
        $books = Book::where('name', 'like', '%'.$bookName.'%')->paginate(5);

        return view('books.index')->with('books', $books);
    }

}
