<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportUserController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $user = Auth::guard('api')->user();

            if (!$user) {
                return $this->errorResponse('User not found');
            }

            $data = [
                'name' => $user->name,
                'phone' => $user->phone,
                'order_count_waiting' => Order::where('user_id', $user->id)->where('status', 'waiting')->count(),
                'order_count_pending' => Order::where('user_id', $user->id)->where('status', 'pending')->count(),
                'order_count_accepted' => Order::where('user_id', $user->id)->where('status', 'accepted')->count(),
                'order_count_cancel' => Order::where('user_id', $user->id)->where('status', 'cancel')->count(),
            ];

            return $this->successResponse($data, 'Data returned successfully');
        } catch (\Exception $exception) {
            return $this->errorResponse('Something went wrong, please try again later');
        }
    }

}
