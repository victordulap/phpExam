<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cars extends Controller
{
    public function index()
    {
        $cars = DB::select('SELECT * FROM cars WHERE available=1');

        return view('cars', ['cars' => $cars]);
    }

    public function getCarsForSelling()
    {
        $cars = DB::select('SELECT * FROM cars WHERE available=1');

        return view('sell-car', ['cars' => $cars]);
    }

    public function sell(Request $req)
    {
        $id = $req->id;

        $car = DB::select('SELECT * FROM cars WHERE id=?', [$id]);
        // echo $car[0]->id;
        // echo $car[0]->brand;
        return view('selling-car', ['car' => $car[0]]);
    }

    public function sellToNewClient(Request $req)
    {
        $id = $req->id;

        $car = DB::select('SELECT * FROM cars WHERE id=?', [$id]);
        // echo $car[0]->id;
        // echo $car[0]->brand;
        return view('new-client', ['car' => $car[0]]);
    }

    public function sellToNewClientComplete(Request $req)
    {
        $carId = $req->carId;
        $clientName = $req->name;
        $clientSurname = $req->surname;
        $clientTel = $req->tel;

        $car = DB::select('SELECT * FROM cars WHERE id=?', [$carId]);

        DB::insert('INSERT INTO clients (name, surname, tel) VALUES (?, ?, ?)', [$clientName, $clientSurname, $clientTel]);
        $client = DB::select('SELECT * FROM clients where name=? AND surname=? AND tel=?', [$clientName, $clientSurname, $clientTel]);

        // sell car
        DB::update('UPDATE cars SET available=0 WHERE id=?', [$carId]);

        // register sold car to client
        DB::insert('INSERT INTO soldcars (carid, clientid) VALUES (?, ?)', [$carId, $client[0]->id]);

        return view('car-sold', ['car' => $car[0], 'client' => $client[0]]);
    }

    public function sellToOldClient(Request $req)
    {
        $id = $req->id;

        $car = DB::select('SELECT * FROM cars WHERE id=?', [$id]);
        $clients = DB::select('SELECT * FROM clients');

        return view('old-client', ['car' => $car[0], 'clients' => $clients]);
    }

    public function sellToOldClientComplete(Request $req)
    {
        $carId = $req->carId;
        $clientId = $req->clientId;

        $car = DB::select('SELECT * FROM cars WHERE id=?', [$carId]);
        $client = DB::select('SELECT * FROM clients where id=?', [$clientId]);

        // sell car
        DB::update('UPDATE cars SET available=0 WHERE id=?', [$carId]);

        // register sold car to client
        DB::insert('INSERT INTO soldcars (carid, clientid) VALUES (?, ?)', [$carId, $clientId]);

        return view('car-sold', ['car' => $car[0], 'client' => $client[0]]);
    }

    public function getSoldCars()
    {
        $soldcars = DB::select('SELECT c.id as carId, c.brand, c.model, c.price, cl.id as clientId, cl.name, cl.surname, cl.tel
                            FROM cars c
                            INNER JOIN soldcars as sc 
                            on c.id=sc.carid
                            INNER JOIN clients as cl
                            on sc.clientid=cl.id');

        // print_r($soldcars);
        return view('sold-cars', ['soldcars' => $soldcars]);
    }

    public function getAvailableCars()
    {
        $cars = DB::select('SELECT * FROM cars WHERE available=1');;

        return view('available-cars', ['cars' => $cars]);
    }

    public function getAllCars()
    {
        $cars = DB::select('SELECT * FROM cars');;

        return view('all-cars', ['cars' => $cars]);
    }
}
