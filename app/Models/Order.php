<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    const PAYED = 'PAYED';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const EXPIRED = 'EXPIRED';

    protected $fillable = [
        'reference',
        'total',
        'user_id',
        'request_id',
        'status',
        'process_url',
        'expiration_date'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
