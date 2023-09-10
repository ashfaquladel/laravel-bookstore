<?php

namespace App\Http\Controllers;

use App\Models\Book; // Make sure to import the Book model
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display a listing of the books.
    public function index()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    // Show the form for creating a new book.
    public function create()
    {
        return view('books.create');
    }

    // Store a newly created book in the database.
    public function store(Request $request)
    {
        // Validate the request data first
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
        ]);

        // Create a new book instance and save it
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->published_year = $request->input('published_year');
        $book->save();

        // Redirect back to the list of books or wherever you prefer
        return redirect('/books')->with('success', 'Book added successfully');
    }

    // Display the specified book.
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    // Show the form for editing the specified book.
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    // Update the specified book in the database.
    public function update(Request $request, $id)
    {
        // Validate the request data first
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
        ]);

        // Find the book by ID and update its attributes
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->published_year = $request->input('published_year');
        $book->save();

        // Redirect back to the book's details page or wherever you prefer
        return redirect('/books/' . $id)->with('success', 'Book updated successfully');
    }

    // Remove the specified book from the database.
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // Redirect back to the list of books or wherever you prefer
        return redirect('/books')->with('success', 'Book deleted successfully');
    }
}
