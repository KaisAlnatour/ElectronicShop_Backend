<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ProductRes;
use App\Http\Resources\SupplierRes;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'supplierId' => 'required',
                'productName' => 'required',
                'unitPrice' => 'numeric'
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $supplier = Supplier::where('id',$request->supplierId)->first();
        if (is_null($supplier)) {
            return $this->sendError('Supplier Not Found ');
        } else {
            $product = new Product();
            $product->supplierId = $request->supplierId;
            $product->productName = $request->productName;
            $product->unitPrice = $request->unitPrice;
            $product->save();

            return $this->sendResponse(new ProductRes($product), 'Add Product successfully.');
        }
    }


    public function editProduct(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'supplierId' => 'required',
                'productName' => 'required',
                'unitPrice' => 'required'
            ]
        );

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 400);
        }

        $product = Product::find($request->id);
        if (is_null($product)) {
            return $this->sendError('Not Found Product.');
        }
        $product->supplierId = $request->supplierId;
        $product->productName = $request->productName;
        $product->unitPrice = $request->unitPrice;
        $product->save();

        return $this->sendResponse(new ProductRes($product), 'Edit Product successfully.');
    }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->sendError('Not Found Product.');
        }
        $product->delete();
        return $this->sendSuccess('delete Product successfully.');

    }



    public function getAllProduct()
    {
        $product = Product::all();
        return $this->sendResponse(ProductRes::collection($product), 'Product retrieved successfully.');
    }

    public function getAllSupplier()
    {
        $product = Supplier::all();
        return $this->sendResponse(SupplierRes::collection($product), 'Product retrieved successfully.');
    }

}
