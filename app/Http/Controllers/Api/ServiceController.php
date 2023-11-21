<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResources;
use App\Models\Service;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Service::get();
        if ($data){
            return $this->successResponse(ServiceResources::collection($data),'data rerun successfully');
        }
        return $this->successResponse('','data rerun successfully');
    }


    public function show($id)
    {
        $data = Service::where('id',$id)->first();
        if ($data){
            return $this->successResponse(new ServiceResources($data),'data rerun successfully');
        }

        return $this->successResponse('','data rerun successfully');

    }
}
