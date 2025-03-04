<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait EsewaTrait
{
    public function epay($amount, $taxAmount, $totalAmount, $productCode, $productServiceCharge, $productDeliveryCharge)
    {
        $uuid = time();
        $merchantKey = config('services.esewa.secret_key');
        $message = "total_amount=$totalAmount,transaction_uuid=$uuid,product_code=$productCode";
        $signature = hash_hmac('sha256', $message, $merchantKey);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->asForm()->post(config('services.esewa.pay_url'), [
            "amount" => $amount,
            "failure_url" => config('services.esewa.failure_url'),
            "product_delivery_charge" => $productDeliveryCharge,
            "product_service_charge" => $productServiceCharge,
            "product_code" => $productCode,
            "signature" => base64_encode($signature),
            "signed_field_names" => "total_amount,transaction_uuid,product_code",
            "success_url" => config('services.esewa.success_url'),
            "tax_amount" => $taxAmount,
            "total_amount" => $totalAmount,
            "transaction_uuid" => $uuid,
        ]);
        return $response;
    }
}
