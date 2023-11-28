<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResources;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Order::where('user_id', auth('api')->id())->get();
        if ($data) {
            return $this->successResponse(OrderResources::collection($data), 'data return successfully');
        }
        return $this->successResponse('', 'data rerun successfully');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'payment_type_id' => 'required|exists:payment_types,id',
            'delivery' => 'required',
            'price_delivery' => 'required',
            'weight' => 'required',
            'type_goods' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'photo' => 'required',
            'notes' => 'required',
            'lat' => 'required',
            'log' => 'required',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }

        $product = Product::findorfail($request->product_id);

        try {
            $data = Order::create([

                'order_code' => 'order_' . rand(1000, 5000),
                'user_id' => auth('api')->id(),
                'product_id' => $request->product_id ?? null,
                'payment_type_id' => $request->payment_type_id,
                'total' => $request->total,
                'weight' => $request->weight,
                'type_goods' => $request->type_goods,
                'quantity' => $request->quantity,
                'photo' => $request->photo,
                'notes' => $request->notes,
                'lat' => $request->notes,
                'log' => $request->notes,
                'status' => 'waiting',
                'date' => date('Y-m-d'),
//                'delivery' => $request->delivery,
//                'price_delivery' => $request->price_delivery,
//                'price_tax' => Setting::first()->price_tax,
            ]);
            if ($data){
                Order::findorfail($data->id)->update([
                   'qr_code' => url() . $data->order_code
                ]);
            }
            return $this->successResponse(new OrderResources($data), 'Deleted Captain Successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse('Something went wrong, please try again later');
        }


    }

    public function assign(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_code' => 'required|exists:orders,order_code',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }
        try {
            Order::where('order_code', $request->order_code)->update([
                'driver_id' => auth('api')->id(),
            ]);
            return $this->successResponse('', 'Order assign Drivers' . auth('api')->user()->name);
        } catch (\Exception $exception) {
            return $this->errorResponse('Something went wrong, please try again later');
        }
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_code' => 'required|exists:orders,order_code',
            'status' => 'required|in:pending,accepted,cansel',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }

        try {
            Order::where('order_code', $request->order_code)->update([
                'status' => $request->status,
            ]);
            return $this->successResponse('', 'Order Updated successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse('Something went wrong, please try again later');
        }

    }

}
