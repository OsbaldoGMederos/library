@extends('layouts.app')
@section('content')
    <h3 class="my-2">Details of {{$book->name}}</h3>
    <div class="card bg-light mx-auto" style="max-width: 35rem; min-width: 18rem">
        <div class="card-body">
            <h4 class="card-title text-center">{{$book->name}}</h4>
            <hr>
            <div class="my-3">
                @if($book->user == 'No User')
                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">Availabe</button>
                @else
                   <p class="card-text">
                        This book was borrowed to <strong><i>{{$book->user}}</i></strong>
                        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#returningBookModal">Not Availabe</button>
                    </p>
                @endif
            </div>
            <p class="card-text">
                <strong>Author: </strong>{{$book->author}}
            </p>
            <p class="card-text">
                <strong>Category: </strong><a href="/categories/{{$category->id}}">{{$category->name}}</a>
            </p>
        </div>
        <div class="card-footer bg-transparent">
        <p class="text-center">Published on {{$book->published_date->format('Y-M-d')}}</p>
        </div>
    </div>

    <!-- Edit & Delete buttons -->

    <div class="row my-3">
        <div class="col-sm"></div>
        <div class="col-sm">
            <div>
                <a href="/books/{{$book->id}}/edit" class="btn btn-light float-left">Edit</a>
            </div>
            <div>
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">Delete</button>
            </div>
        </div>
        <div class="col-sm"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lend a Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => ['BooksController@linkUser', $book->id], 'method' => 'POST']) !!}
                    {{Form::label('user', 'Add User')}}
                    {{Form::text('user', '', ['class' => 'form-control'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Apply', ['class' => 'btn btn-primary my-2'])}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="returningBookModal" tabindex="-1" role="dialog" aria-labelledby="returningBookModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returningModalTitle">Set book as Available</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => ['BooksController@setAsAvailable', $book->id], 'method' => 'POST']) !!}
                    <label>Did {{$book->user}} return the book?</label> <br>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Yes', ['class' => 'btn btn-primary my-2'])}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalTitle">Delete Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST']) !!}
                    <label>Are you sure?</label> <br>
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger my-2'])}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection