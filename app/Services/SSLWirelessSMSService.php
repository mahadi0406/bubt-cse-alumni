<?php

namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SSLWirelessSMSService
{
    const BASE_URL = 'https://sms.sslwireless.com';
    public Client $client;
    protected string $user;
    protected string $pass;

    public function __construct($baseUrl = null)
    {
        $baseUrl = $baseUrl ? $baseUrl : self::BASE_URL;
        $this->client = new Client(['base_uri' => $baseUrl, 'timeout' => 2.0]);
        $this->user = config('services.sms.sslwireless.user');
        $this->pass = config('services.sms.sslwirelesssms.pass');
    }


    /**
     * @throws GuzzleException
     */
    public function sendSMS(string $to, string $message)
    {
        $response = $this->client->post('/api/v3/send-sms', [
            'form_params' => [
                'user' => $this->user,
                'pass' => $this->pass,
                'msisdn' => $to,
                'sms' => $message,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

}
