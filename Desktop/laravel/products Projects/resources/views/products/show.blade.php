
@extends('layouts.app')
@section('title')
    <title>Show Product</title>
@endsection

@section('content')

      <div class="container mb-2">
        <div class="text-center mt-4">
            <div class="mt-4">

            </div>
        </div>
      </div>
      <div class="card text-white text-center bg-secondary mb-3">
        <div class="card-header">{{$product["name"]}}</div>
        <div class="card-body">
            <h5 class="card-title">{{$product["id"]}}</h5>
          <h5 class="card-title">{{$product["price"]}}</h5>
          <p class="card-text">{{$product["created_at"]}}</p>
        </div>
      </div>
@endsection


