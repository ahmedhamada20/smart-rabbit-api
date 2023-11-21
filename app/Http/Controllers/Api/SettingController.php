<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponsResources;
use App\Http\Resources\PaymentTypeResources;
use App\Http\Resources\SettingResources;
use App\Models\Coupon;
use App\Models\PaymentType;
use App\Models\Setting;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ApiResponseTrait;
    public function payment()
    {
        $data = PaymentType::all();
        if ($data){
            return $this->successResponse(PaymentTypeResources::collection($data),'data return successfully');
        }
        return $this->successResponse('','data return successfully');

    }
    public function showPayment($id)
    {
        $data = PaymentType::findorfail($id);
        if ($data){
            return $this->successResponse(new PaymentTypeResources($data),'data return successfully');
        }
        return $this->successResponse('','data return successfully');
    }
    public function coupons()
    {
        $data = Coupon::all();
        if ($data){
            return $this->successResponse(CouponsResources::collection($data),'data return successfully');
        }
        return $this->successResponse('','data return successfully');
    }

    public function showCoupons($id)
    {
        $data = Coupon::findorfail($id);
        if ($data){
            return $this->successResponse(new CouponsResources($data),'data return successfully');
        }
        return $this->successResponse('','data return successfully');
    }


    public function setting()
    {
        $data = Setting::findorfail(1);
        if ($data){
            return $this->successResponse(new SettingResources($data),'data return successfully');
        }
        return $this->successResponse('','data return successfully');
    }
}
