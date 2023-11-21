<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResources;
use App\Models\Wallet;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Wallet::where('user_id',auth('api')->id())->get();
        if ($data){
            return $this->successResponse(WalletResources::collection($data),'data rerun successfully');

        }
        return $this->successResponse('','data rerun successfully');

    }
}
