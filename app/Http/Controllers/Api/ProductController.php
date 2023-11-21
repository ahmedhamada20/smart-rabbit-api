<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResources;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Product::whereStatus('active')->get();
        if ($data){
            return $this->successResponse(ProductResources::collection($data),'data rerun successfully');
        }
        return $this->successResponse('','data rerun successfully');
    }


    public function show($id)
    {
        $data = Product::where('id',$id)->whereStatus('active')->first();
        if ($data){
            return $this->successResponse(new ProductResources($data),'data rerun successfully');
        }

        return $this->successResponse('','data rerun successfully');

    }


}
