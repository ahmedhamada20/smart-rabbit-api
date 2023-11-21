<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResources;
use App\Models\Favorite;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Favorite::where('user_id', auth('api')->id())->get();
        if ($data) {
            return $this->successResponse(FavoriteResources::collection($data), 'data rerun successfully');

        }
        return $this->successResponse('', 'data rerun successfully');

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }

        try {
            $data = Favorite::create([
                'user_id' => auth('api')->id(),
                'product_id' => $request->product_id,
            ]);
            return $this->successResponse(new FavoriteResources($data), 'data rerun successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse('Error Created', 400);

        }


    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'favorite_id' => 'required|exists:favorites,id',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }
        try {
            Favorite::destroy($request->favorite_id);
            return $this->successResponse('deleted Success');
        } catch (\Exception $exception) {
            return $this->errorResponse('Error Created', 400);

        }

    }

}
