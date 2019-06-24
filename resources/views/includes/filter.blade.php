{!! Form::open(['action' => 'BooksController@filter', 'method' => 'POST']) !!}
    <div class="form-group row">
        {{Form::label('search', 'Book Search', ['class' => 'col-sm-2 col-form-label'])}}
        <div class="col-sm-10">
            {{Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'Book name'])}}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            {{Form::submit('Search', ['class' => 'btn btn-primary'])}}
        </div>
        <div class="col-sm-3">
            <small>Order by: <a href="/books?sortBy=name">Name</a></small>
        </div>
        <div class="col-sm-3">
            <small><a href="/books?sortBy=author">Author</a></small>
        </div>
        <div class="col-sm-3">
            <small><a href="/books?sortBy=published_date">Published Date</a></small>
        </div>
    </div>
{!! Form::close() !!}