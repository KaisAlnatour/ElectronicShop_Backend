<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\OrderRes;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController
{
    public function addOrder(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'customerId' => 'required',
                'orderDate' => 'required',
                'orderNumber' => 'required',
                'TotalAmount' => 'required'
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $supplier = Customer::where('id',$request->customerId)->first();
        if (is_null($supplier)) {
            return $this->sendError('Customer Not Found ');
        } else {
            $product = new Order();
            $product->customerId = $request->customerId;
            $product->orderDate = Carbon::createFromFormat(config('app.dateFormat'), $request->orderDate)->format('Y/m/d');;
            $product->orderNumber = $request->orderNumber;
            $product->TotalAmount = $request->TotalAmount;
            $product->save();

            return $this->sendResponse(new OrderRes($product), 'Add Product successfully.');
        }
    }


    public function editOrder(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'customerId' => 'required',
                'orderDate' => 'required',
                'orderNumber' => 'required',
                'TotalAmount' => 'required'
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $product = Order::find($request->id);
        if (is_null($product)) {
            return $this->sendError('Not Found Order.');
        }
        $product->customerId = $request->customerId;
        $product->orderDate = Carbon::createFromFormat(config('app.dateFormat'), $request->orderDate)->format('Y/m/d');;
        $product->orderNumber = $request->orderNumber;
        $product->TotalAmount = $request->TotalAmount;
        $product->save();

        return $this->sendResponse(new OrderRes($product), 'Edit Order successfully.');
    }


    public function deleteOrder($id)
    {
        $product = Order::find($id);
        if (is_null($product)) {
            return $this->sendError('Not Found Order.');
        }
        $product->delete();
        return $this->sendSuccess('delete Order successfully.');

    }

    public function getAllOrder()
    {
        $order = Order::all();
        return $this->sendResponse(OrderRes::collection($order), 'Order retrieved successfully.');
    }
}
