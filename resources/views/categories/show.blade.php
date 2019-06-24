@extends('layouts.app')
@section('content')
  <div class="row mt-2">
    <div class="col-md">
      <h3 class="mt-2 mb-2">Books in category: {{$category->name}}</h3>
    </div>
    <div class="col-md">
      <button class="btn btn-danger ml-2 float-right" data-toggle="modal" data-target="#deleteModal">Delete</button>
      <a href="/categories/{{$category->id}}/edit" class="btn btn-secondary float-right">Edit</a>
    </div>
  </div>
      <p class="text-center">
      {{$category->description}}
    </p>
    @if(count($books) > 0)
      <div class="row align-items-center">
        @foreach ($books as $book)
            {{-- <div class="card card bg-light d-md-inline-flex d-block mx-2 my-2 book-card" > --}}
            <div class="card bg-light col-md book-card mx-auto my-2" >
              <div class="card-body">
                <h3 class="card-title text-center"><a href="/books/{{$book->id}}">{{$book->name}}</a></h3>
                @if($book->user == 'No User') 
                  <p class="text-center"><span class="badge badge-success">Available</span></p>
                @else
                  <p class="text-center"><span class="badge badge-danger">Not Available</span></p>
              <p class=""><strong>User:</strong> {{$book->user}}</p>
                @endif
                <p class="card-text"><strong>Author: </strong>{{$book->author}}</p>
                <p class="card-text"><strong>Category: </strong>{{$category->name}}</p>
                <div class="card-footer bg-transparent">
                  <small class="card-text">Published on {{$book->published_date->format('Y-M-d')}}</small>
                </div>
              </div>
            </div>
        @endforeach
        </div>
      @else
        <div>
          <h4 class="text-center mt-5">No Books Found</h4>
        </div>
    @endif

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalTitle">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                    <label>Are you sure? This will delete the books in this cateogory</label> <br>
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger my-2'])}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection