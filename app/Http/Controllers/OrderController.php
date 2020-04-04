<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\Placetopay;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $product = Product::find($request->id);
        if (!$product) abort(404, 'Not Found');

        $order = Order::create([
            'reference' =>  substr(md5(uniqid(rand())),0,10),
            'total' => $product->price,
            'user_id' => Auth::id()
        ]);

        Item::create([
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->price,
            'product_id' => $product->id,
            'order_id' => $order->id
        ]);

        return redirect()->route('orders.show',$order->id)
            ->with('success','Orden creada exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('order', ['order' => Order::with('items')->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pay(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $order = Order::where(['id' => $request->id, 'user_id' => Auth::id()])->first();

        $placetopay = new Placetopay();
        $response = $placetopay->request($order->total, $order->reference);
        if ($response->isSuccessful()) {
            return Redirect::to($response->processUrl());
        } else {
            $response->status()->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $reference
     * @return \Illuminate\Http\Response
     */
    public function response($reference)
    {
        return view('response', ['reference' => $reference]);
    }
}
