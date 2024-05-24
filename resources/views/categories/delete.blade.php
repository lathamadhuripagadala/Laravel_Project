@extends('layouts.app')

@section('content')
    <h1>Delete Category</h1>

    <p>Are you sure you want to delete this category?</p>

    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
