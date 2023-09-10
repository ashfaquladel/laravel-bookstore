@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
    <a href="{{ url('/books') }}" class="btn btn-secondary">Back to Books</a>
@endsection
