<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'order_id',
        'product_id'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
