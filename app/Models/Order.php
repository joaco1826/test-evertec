<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    const PAYED = 'PAYED';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';

    protected $fillable = [
        'reference',
        'total',
        'user_id',
        'request_id',
        'status',
        'expiration_date'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
