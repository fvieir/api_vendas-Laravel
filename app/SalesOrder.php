<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $fillable = [
        'status',
        'client_id'
    ];
    /**
     * Get the client that owns the SalesOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get all of the product_order for the SalesOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_order()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
