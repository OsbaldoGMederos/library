@extends('layouts.app')
@section('content')
    <h3 class="my-2">Books</h3>

    <!-- Filter -->
    @include('includes.filter')

    @if(count($books) > 0)
    <ul class="list-group">
        <div class="row d-none d-md-flex d-lg-flex d-xl-flex">
            <div class="col-md">Name</div>
            <div class="col-md">Author</div>
            <div class="col-md">Status</div>
        </div>
        @foreach ($books as $book)
            <li class="list-group-item my-1">
                <div class="row">
                    <div class="col-md">
                    <a href="/books/{{$book->id}}"><strong>{{$book->name}}</strong></a>
                    </div>
                    <div class="col-md">
                        <p>{{$book->author}}</p>
                    </div>
                    <div class="col-md">
                        @if($book->user == 'No User')
                            <span class="badge badge-success">Availabe</span>
                        @else
                            <span class="badge badge-danger">Not Availabe</span>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{$books->links('vendor.pagination.bootstrap-4')}}
      @else
        <div>
          <p class="text-center">No Books Found</p>
        </div>
    @endif


@endsection