@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    <form method="POST" action="{{ url('/books/' . $book->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="published_year">Published Year:</label>
            <input type="number" class="form-control" id="published_year" name="published_year" value="{{ $book->published_year }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
    <a href="{{ url('/books') }}" class="btn btn-secondary mt-2">Back to Books
