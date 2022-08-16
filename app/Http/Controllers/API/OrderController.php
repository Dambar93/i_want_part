<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;
use App\Models\Part;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Exceptions\PartIsOutOfStock;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        try {
            DB::beginTransaction();
        
            $data = $request->validate([
                'buyer' => 'required',
                'country' => 'required',
                'city' => 'required',
                'address' => 'required',
                'zip' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'items' => 'array'

            ]);
            $address = Address::create($data);
            $data['status'] = 'pending';
            $data['address_id'] = $address -> id;
            $data['unique_id'] = $address -> id . rand(10000, 99999) . 'DB';
            $order = Order::create($data);

            $cart = $data['items'];
            $order_items = [];

            foreach ($cart as $item) {
                $part = Part::find($item['id']);
                if ($part['quantity'] < 1) {
                    $errorMessage = 'Part ' . $part['title'] . ' is out of stock';
                    throw new PartIsOutOfStock($errorMessage);
                }
                if ($part['quantity'] > 0) {
                    $part -> quantity -= 1;
                    $part -> save();
                    $data['quantity'] = 1;
                    $data['item_id'] = $part['id'];
                    $data['order_id'] = $order['id'];
                    $orderItem = OrderItem::create($data);
                }

                
                array_push($order_items, $orderItem);
            }

            DB::commit();


            return [ 'order_id' => $order ['unique_id']];
        } catch (\Exception $e) {
            DB::rollBack();

            return ['error' => $e -> getMessage()];
        }
    }

    public function listLogged()
    {
        $user = Auth::user();
        
        $order = Order::where('email', '=', $user -> email)
        ->get();

        return new OrderCollection($order);
    }

    public function findOrder(Request $request)
    {
        $data = $request-> all();

        $order = Order::where('email', '=', $data['email'])
        ->where('unique_id', '=', $data['orderId'])
        ->get();

        return [
            'status' => $order[0]['status'],
            'id' => $order[0]['unique_id'],
            
        ];
    }
}
