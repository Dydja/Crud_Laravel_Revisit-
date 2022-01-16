@extends('template.app')
@section('content')

<h3>Add Product</h3>
<!--Sil ya des erreurs affiche moi ces erreurs -->
@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
<!-- -->

<form action="{{ route('product.store') }}" method="post">
  @csrf
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Your name">
  </div>

  <label  class="form-label">Price</label>
  <input type="number" class="form-control" name="price"  placeholder="Your price">

  <div class="mb-3">
    <label  class="form-label">Description</label>
    <textarea class="form-control" name="description"  rows="3" placeholder="Enter your decription"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Add</button>
</form>

@endsection
