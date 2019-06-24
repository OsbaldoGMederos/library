@extends('layouts.app')
@section('content')
    <h3 class="my-2">Add a Book</h3>
    {!! Form::open(['action' => 'BooksController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control mb-2', 'placeholder' => 'Name'])}}
            {{Form::label('author', 'Author')}}
            {{Form::text('author', '', ['class' => 'form-control mb-2', 'placeholder' => 'Author'])}}
            {{Form::label('published_date', 'Published Date')}}
            {{Form::date('published_date', \Carbon\Carbon::now('America/Montreal'),  ['class' => 'form-control mb-2', 'id' => 'myDatePicker'])}}
            {{Form::label('category', 'Category', ['class' => 'mt-2'])}}
            <select name="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        {{Form::submit('Add Book', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection