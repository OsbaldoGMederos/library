<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #6c4604;">
<a class="navbar-brand" href="/books">{{config('app.name')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/books">Books</a>
      </li>
      <li class="nav-item">
        <a href="/categories" class="nav-link">Categories</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a href="/books/create" class="nav-link">Add Book</a>
      </li>
      <li class="nav-item">
        <a href="/categories/create" class="nav-link">Add Category</a>
      </li>
    </ul>
  </div>
</nav>