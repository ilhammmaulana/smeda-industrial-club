<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'transaction_code' => $this->transaction_code,
            'status' => $this->status,
            'total_amount' => $this->total_amount,
            'setting' => $this->setting ? [
                'name' => $this->setting->name,
                'product_id' => $this->setting->product_id,
            ] : null,
            'payment_method' => $this->payment_method,
            'transaction_date' => $this->transaction_date,
            'snap_token' => $this->snap_token,
            'product' => $this->product ? [
                'name' => $this->product->name,
                'category' => $this->product->category ? [
                    'name' => $this->product->category->name,
                ] : null,
            ] : null,
            'product_detail' => $this->productDetail ? [
                'item' => $this->productDetail->item,
            ] : null,
            'user' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ] : null,
        ];
    }
}
