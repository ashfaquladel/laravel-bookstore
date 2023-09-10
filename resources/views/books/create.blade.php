@extends('layouts.app')

@section('content')
    <h1>Create New Book</h1>
    <form method="POST" action="{{ url('/books') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="published_year">Published Year:</label>
            <input type="number" class="form-control" id="published_year" name="published_year" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
    <a href="{{ url('/books') }}" class="btn btn-secondary mt-2">Back to Books</a>
@endsection
