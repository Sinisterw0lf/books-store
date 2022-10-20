<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::paginate(10);
        return view('pages.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation du formulaire
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:2000|mimes:png,jpg,jpeg',
            'description' => 'required|max:1000',
            'author' => 'required|max:255',
            'price' => 'required|max:4',
            'nombre_pages' => 'required|max:4',
        ]);

        // validation de l'image
        $validateImg = $request->file('image')->store('cover');

        // Creation des données receuillis
        Books::create([
            'title' => $request->title,
            'image' => $validateImg,
            'description' => $request->description,
            'author' => $request->author,
            'price' => $request->price,
            'nombre_pages' => $request->nombre_pages,
            'created_at' => now()
        ]);

        // redirection
        return redirect()->route('index')->with('status', 'Livre enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        // validate form
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:2000|mimes:png,jpg,jpeg',
            'description' => 'required|max:1000',
            'author' => 'required|max:255',
            'price' => 'required|max:4',
            'nombre_pages' => 'required|max:4',
        ]);

        // if image
        if ($request->hasFile('image')) {
            // delete last image
            Storage::delete($book->image);
            // storage new image
            $book->image = $request->file('image')->store('cover');

            // update and store to DB
            $book->update([
                'title' => $request->title,
                'image' => $book->image,
                'description' => $request->description,
                'author' => $request->author,
                'price' => $request->price,
                'nombre_pages' => $request->nombre_pages,
                'updated_at' => now()
            ]);

            // redirect
            return redirect()->route('books.show', $book->id)->with('status', 'Livre modifié');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('index')->with('status', 'Livre supprimé !');
    }
}
