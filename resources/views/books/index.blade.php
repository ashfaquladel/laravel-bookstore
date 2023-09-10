@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    <a href="{{ url('/books/create') }}" class="btn btn-primary">Add New Book</a>

    @if (count($books) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>
                            <a href="{{ url('/books/' . $book->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ url('/books/' . $book->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ url('/books/' . $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No books found.</p>
    @endif
@endsection
