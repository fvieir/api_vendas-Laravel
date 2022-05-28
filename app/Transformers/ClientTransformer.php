<?php
namespace App\Transformers;

use App\Client;


class ClientTransformer extends Transformer {

    public function transformer (Client $client) 
    {
        // return $this->transformerForTel($client->telephones);

        return [
            'id' => $client->id,
            'name' => $client->name,
            'address' => $client->address,
            'type' => $client->type,
            'cpf' => $client->cpf,
            'cnpj' => $client->cnpj,
            'number' => $client->telephones,
            'created_at' => $client->created_at,
            'updated_at' => $client->updated_at,
        ];
    }

    public function transformerForTel($tels) 
    {
        dump($tels);
    }

}