@extends('layouts.app')

@section('title')
    <title>Create Product</title>
@endsection

@section('content')
<form action="{{route("products.store")}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ID</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="id">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="price">
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


