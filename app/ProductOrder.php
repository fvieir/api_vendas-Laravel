<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $fillable = [
        'qtde',
        'price',
        'sales_order_id',
        'product_id'
    ];
    /**
     * Get all of the products for the ProductOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    /**
     * Get the sales_order that owns the ProductOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sales_order()
    {
        return $this->belongsTo(SalesOrder::class);
    }
}
