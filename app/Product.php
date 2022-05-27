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
     * Get all of the sales_order for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales_order()
    {
        return $this->hasMany(Sale::class);
    }
}
