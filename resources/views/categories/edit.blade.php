@extends('layouts.app')
@section('content')
    <h3 class="my-2">Edit Category</h3>

    {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::Label('name', 'Name')}}
            {{Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::Label('description', 'Description')}}
            {{Form::textarea('description', $category->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection