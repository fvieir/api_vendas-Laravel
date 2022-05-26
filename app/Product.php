<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'references',
        'description',
        'brand',
        'price',
        'quantity_in_stock'
    ];

    /**
     * Get all of the sales for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
