@extends('layouts.app')
@section('content')
    <h3 class="mt-2">Categories</h3>
    @if(count($categories) > 0)
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item my-1" style="padding:0;">
                    <div class="card card bg-light">
                        <div class="card-body">
                        <h4 class="card-title"><a href="/categories/{{$category->id}}">{{$category->name}}</a></h4>
                        <p class="card-text">{{$category->description}}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
            {{$categories->links('vendor.pagination.bootstrap-4')}}
    @else
        <p class="no-categories mt-4">No Categories Found</p>
    @endif
@endsection