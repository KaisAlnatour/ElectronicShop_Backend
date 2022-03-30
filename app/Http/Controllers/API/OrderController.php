<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\CustomerRes;
use App\Http\Resources\OrderRes;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
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
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $supplier = Customer::where('id',$request->customerId)->first();
        if (is_null($supplier)) {
            return $this->sendError('Customer Not Found ');
        } else {
            $order = new Order();
            $order->customerId = $request->customerId;
            $order->orderDate = Carbon::createFromFormat(config('app.dateFormat'), $request->orderDate)->format('Y/m/d');
            $order->orderNumber = $request->orderNumber;
            $order->TotalAmount = 0;
            $order->save();

            $totalAmount = 0;

            if (isset($request->itmes)) {
                foreach ($request->itmes as $key => $value) {
                    $itme = new OrderItem();
                    $itme->orderId = $order->id;
                    $itme->productId = $value['productId'];
                    $itme->quantity = $value['quantity'];
                    $product = Product::find($value['productId']);
                    $itme->unitPrice = $product->unitPrice * $itme->quantity;
                    $itme->save();
                    $totalAmount += $itme->unitPrice;
                }
            }

            $order->TotalAmount = $totalAmount;
            $order->save();

            return $this->sendResponse(new OrderRes($order), 'Add Product successfully.');
        }
    }


    public function editOrder(Request $request)
    {


        $validator = Validator::make($request->all(),
            [
                'customerId' => 'required',
                'orderDate' => 'required',
                'orderNumber' => 'required',
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $supplier = Customer::where('id',$request->customerId)->first();
        if (is_null($supplier)) {
            return $this->sendError('Customer Not Found ');
        } else {
            $order = Order::find($request->id);
            $order->customerId = $request->customerId;
            $order->orderDate = Carbon::createFromFormat(config('app.dateFormat'), $request->orderDate)->format('Y/m/d');
            $order->orderNumber = $request->orderNumber;
            $order->TotalAmount = 0;
            $order->save();

            $totalAmount = 0;

            if (isset($request->itmes)) {
                foreach ($request->itmes as $key => $value) {
                    if (isset($value['id']))
                        $itme = OrderItem::find($value['id']);
                    else
                        $itme = new OrderItem();

                    $itme->orderId = $order->id;
                    $itme->productId = $value['productId'];
                    $itme->quantity = $value['quantity'];
                    $product = Product::find($value['productId']);
                    $itme->unitPrice = $product->unitPrice * $itme->quantity;
                    $itme->save();
                    $totalAmount += $itme->unitPrice;
                }
            }

            $order->TotalAmount = $totalAmount;
            $order->save();
        }

        return $this->sendResponse(new OrderRes($order), 'edit Product successfully.');

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

    public function getAllCustomer()
    {
        $customer = Customer::all();
        return $this->sendResponse(CustomerRes::collection($customer), 'Customer retrieved successfully.');
    }

}
