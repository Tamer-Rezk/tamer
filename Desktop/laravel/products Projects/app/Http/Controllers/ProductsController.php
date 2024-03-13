<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $products = [
        ["id" => 1, "name" => "car", "price" => 120000, "created_at" => "2024-03-04 12:00:00"],
        ["id" => 2, "name" => "iphone", "price" => 22000, "created_at" => "2024-03-05 13:00:00"],
        ["id" => 3, "name" => "smart watch", "price" => 8000, "created_at" => "2024-03-06 14:00:00"],
        ["id" => 4, "name" => "macbook", "price" => 12000, "created_at" => "2024-03-07 15:00:00"]
    ];

    public function index()
    {
        #select * from products
        $allProducts = [
            ["id" => 1, "name" => "car", "price" => 120000, "created_at" => "2024-03-04 12:00:00"],
            ["id" => 2, "name" => "iphone", "price" => 22000, "created_at" => "2024-03-05 13:00:00"],
            ["id" => 3, "name" => "smart watch", "price" => 8000, "created_at" => "2024-03-06 14:00:00"],
            ["id" => 4, "name" => "macbook", "price" => 12000, "created_at" => "2024-03-07 15:00:00"]
        ];
        return view("products.index", ["products" => $allProducts]);
    }

    public function show($productID)
    {
        # select * from products where id = $productID
        $allProducts = [
            ["id" => 1, "name" => "car", "price" => 120000, "created_at" => "2024-03-04 12:00:00"],
            ["id" => 2, "name" => "iphone", "price" => 22000, "created_at" => "2024-03-05 13:00:00"],
            ["id" => 3, "name" => "smart watch", "price" => 8000, "created_at" => "2024-03-06 14:00:00"],
            ["id" => 4, "name" => "macbook", "price" => 12000, "created_at" => "2024-03-07 15:00:00"]
        ];
        $res = array_filter($allProducts, fn ($product) => $product["id"] == $productID);
        $product = [...$res][0];
        return view("products.show", ["product" => $product]);
    }

    public function create()
    {
        return view("products.create");
    }

    public function store(Request $request)
    {
        //get all request date

        //validate
        $request->validate([
            "id" => "required|numeric",
            "name" => 'required|string',
            "price" => 'required|numeric',
        ]);
        $this->products = [
            "id" => $request->id,
            "name" => $request->name,
            "price" => $request->price
        ];
        //dd($this->products);


        //insert into products (id, name,price,created at)


        // redirect to index view
        return to_route("products.index");
    }

    public function destroy($productID)
    {
        //get prduct id
        //delete from product where id =productID
        return to_route("products.index");
    }

    public function edit($productID)
    {
        $res = array_filter($this->products, fn ($product) => $product["id"] == $productID);
        $product = [...$res][0];
        return view("products.edit", ["product" => $product]);
    }


    public function update($productID, Request $request)
    {
        //validate
        $request->validate([
            "id" => "required|numeric",
            "name" => 'required|string',
            "price" => 'required|numeric',
        ]);
        $editedProduct = [
            "id" => $request->id,
            "name" => $request->name,
            "price" => $request->price
        ];

        $index = array_search($productID, array_column($this->products, "id"));
        $this->products[$index] = $editedProduct;
        dd($this->products);
        //return to_route("products.index");
    }
}
