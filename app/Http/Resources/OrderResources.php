<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrderResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'qr_code' => QrCode::size(300)->backgroundColor(255, 90, 0)->generate($this->qr_code),
            'order_code' => $this->order_code,
            'driver_id' => $this->driver_id != null ? new UserResources($this->driver) : null,
            'user_id' => new UserResources($this->user),
            'product_id' => $this->product_id != null ? new UserResources($this->user) : null,
            'total' => $this->total ?? null,
            'status' => $this->status ?? null,
            'date' => $this->date ?? null,
            'delivery' => $this->delivery ?? null,
            'price_delivery' => $this->price_delivery ?? null,
            'price_tax' => $this->price_tax ?? null,
            'weight' => $this->weight ?? null,
            'type_goods' => $this->type_goods ?? null,
            'quantity' => $this->quantity ?? null,
            'photo' => $this->photo ?? null,
            'notes' => $this->notes ?? null,
            'lat' => $this->lat ?? null,
            'log' => $this->log ?? null,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at
            ],
            'update_dates' => [
                'updated_at_human' => $this->updated_at->diffForHumans(),
                'updated_at' => $this->updated_at
            ]
        ];
    }
}
