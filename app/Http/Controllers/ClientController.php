<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\Transformers\ClientTransformer;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $transfomer;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->transfomer = new ClientTransformer();
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
            $identification = ($type === 'PJ') ? $cpnj = request()->get('cnpj') : $cpf = request()->get('cpf');
            $idNumber = ($type === 'PJ') ? 'cnpj' : 'cpf'; 

            $data = [
                'name' => $name,
                'type' => $type,
                'address' => $address,
                $idNumber => $identification
            ];

            $client = Client::create($data);

            return response()->json($client,201);

        } catch (\Exception $e) {
            return $e;
        }
    }
}
