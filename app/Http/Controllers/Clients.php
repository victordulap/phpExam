<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Clients extends Controller
{
    public function getClients()
    {
        $clients = DB::select('SELECT * FROM clients');

        return view('clients', ['clients' => $clients]);
    }

    public function getClientById(Request $req)
    {
        $id = $req->id;

        $clientInfo = DB::select('SELECT cl.id as clientId, cl.name, cl.surname, cl.tel,
                                         c.id as carId, c.brand, c.model, c.price
                                  FROM clients as cl
                                  INNER JOIN soldcars as sc
                                  on cl.id=sc.clientid
                                  INNER JOIN cars as c
                                  on sc.carid=c.id
                                  WHERE cl.id=?', [$id]);

        // print_r($boughtCars);
        return view('client', ['client' => $clientInfo[0], 'cars' => $clientInfo]);
    }
}
