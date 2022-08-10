<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;




class OrderController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $address = Address::create($data);
        $data['status'] = 'pending';
        $data['address_id'] = $address -> id;
        $data['unique_id'] = 'DB';
        $order = Order::create($data);



        return ['addres_id' => $address -> id,
                'order' => $order
                ]; 
    }
}
