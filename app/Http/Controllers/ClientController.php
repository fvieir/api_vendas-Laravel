<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Telephone;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index () 
    {
        return $this->client->get();
    }

    public function store (ClientRequest $request) 
    {
        try {

            $name = request()->get('name');
            $type = request()->get('type');
            $address = request()->get('address');
            $numberPhone = request()->get('number');
            $typePhone = request()->get('type');
            $t = ($type === 'PJ') ? 'cnpj' : 'cpf'; 
            $identification = ($type === 'PJ') ? $cpnj = request()->get('cnpj') : $cpf = request()->get('cpf');

            $data = [
                'name' => $name,
                'type' => $type,
                'address' => $address,
                $t => $identification
            ];

            $client = Client::create($data);

            if ($client && $numberPhone) {
                Telephone::create([
                    'number' => $numberPhone,
                    'type' => $typePhone,
                    'client_id' => $client->id
                ]);
            }

            return response()->json($client, 200); 

        } catch (\Exception $e) {
            return $e;
        }
    }
}
