@extends('layouts.app')
@section('title')
    <title>Edit Product</title>
@endsection

@section('content')

<form action="{{route("products.update",["product" => $product["id"]])}}" method="POST">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ID</label>
      <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product["id"]}}" name="id">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product["name"]}}" name="name">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product["price"]}}" name="price">
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
  @endif
@endsection
