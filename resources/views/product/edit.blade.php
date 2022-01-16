@extends('template.app')
@section('content')

<h3>Product Update</h3>
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

<form  method="POST" action="{{ route('product.update',$product->id) }}">
 @csrf
 @method('PUT')
<div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
  </div>

  <label  class="form-label">Email address</label>
  <input type="number" class="form-control" name="price"  value="{{ $product->price }}" >

  <div class="mb-3">
    <label class="form-label"> description </label>
    <textarea class="form-control" name=" description" value="{{ $product->description }}" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Save</button>
</form>

@endsection
