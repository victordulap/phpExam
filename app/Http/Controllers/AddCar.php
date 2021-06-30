<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCar extends Controller
{
    public function index(Request $req)
    {
        if ($req->has(['name', 'model', 'price']) && $req->name != null && $req->model != null && $req->price != null) {
            $name = $req->name;
            $model = $req->model;
            $price = $req->price;

            // add to db logic
            DB::insert('INSERT INTO cars (brand, model, price) VALUES (?, ?, ?)', [$name, $model, $price]);

            return view('car-added', ['name' => $name, 'model' => $model, 'price' => $price]);
        }
    }
}
