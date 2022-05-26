<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'address',
        'cpf',
        'cnpj'
    ];

    /**
     * Get all of the telephones for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }

    /**
     * Get all of the sales for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
