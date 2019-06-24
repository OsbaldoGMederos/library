@extends('layouts.app')
@section('content')
    <h3 class="my-2">Edit Book</h3>

    {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $book->name, ['class' => 'form-control mb-2', 'placeholder' => 'Name'])}}
            {{Form::label('author', 'Author')}}
            {{Form::text('author', $book->author, ['class' => 'form-control mb-2', 'placeholder' => 'Author'])}}
            {{Form::label('published_date', 'Published Date')}}
            {{Form::date('published_date', $book->published_date,  ['class' => 'form-control mb-2', 'id' => 'myDatePicker'])}}
            {{Form::label('category', 'Category', ['class' => 'mt-2'])}}
            <select name="category" class="form-control">
                @foreach ($categories as $category)
                    @if($book->category_id == $category->id)
                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Add Book', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection