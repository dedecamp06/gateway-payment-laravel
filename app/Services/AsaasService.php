<?php

namespace App\Services;

use GuzzleHttp\Client;

class AsaasService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('ASAAS_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://sandbox.asaas.com/api/v3/',
            'headers' => [
                'Content-Type' => 'application/json',
                'access_token' => $this->apiKey
            ]
        ]);
    }

    public function createPaymentService(array $data)
    {
        try {
            $response = $this->client->post('payments', [
                'json' => [
                    'customer' => $data['customer'],
                    'billingType' => $data['billingType'],
                    'value' => $data['value'],
                    'dueDate' => $data['dueDate']
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return json_decode($responseBodyAsString, true);
        }
    }

    public function createCustomerService(array $data)
    {
        try {
            $response = $this->client->post('customers', [
                'json' => $data
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return json_decode($responseBodyAsString, true);
        }
    }

    public function getPixQrCode($paymentId)
    {
        try {
            $response = $this->client->get("payments/{$paymentId}/pixQrCode", [
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return json_decode($responseBodyAsString, true);
        }
    }
}