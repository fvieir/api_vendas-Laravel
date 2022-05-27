<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'address',
        'type',
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
     * Get all of the sales_order for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales_order()
    {
        return $this->hasMany(Sale::class);
    }
}
