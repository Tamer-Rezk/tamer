@extends('layouts.app')

@section('title')
    <title>All Products</title>
@endsection

@section('content')

      <div class="container mb-2">
        <div class="text-center mt-4">
            <div class="mt-4">
                <a href="{{route("products.create")}}" class="btn btn-success">Add Product</a>
            </div>
        </div>
      </div>
    <table class="table">
        <thead>
           <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product["id"]}}</td>
                <td>{{$product["name"]}}</td>
                <td>{{$product["price"]}}</td>
                <td>{{$product["created_at"]}}</td>
                <td>
                    <a class="btn btn-outline-info" href="{{route("products.show",$product["id"])}}">View</a>
                    <a class="btn btn-outline-warning" href="{{route("products.edit",$product["id"])}}">Edit</a>
                    <form style="display: inline" action="{{route("products.destroy",$product["id"])}}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger" href="">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

@endsection

