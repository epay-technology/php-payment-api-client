<?php

namespace Epay\PaymentClient;

use Epay\PaymentClient\Requests\CreateAccountRequest;
use Epay\PaymentClient\Responses\AccountResponse;
use ReflectionException;
use Illuminate\Support\Facades\Http;
use Epay\PaymentClient\ObjectMappers\JsonMapper;
use Epay\PaymentClient\Responses\SessionResponse;
use Epay\PaymentClient\Requests\StartSessionRequest;

class Client
{
    /**
     * Constructor
     *
     * @param string $baseUrl
     * @param string $apiKey
     */
    public function __construct(
        public string $baseUrl,
        public string $apiKey
    ){}

    /**
     * Makes a request to start a new payment session
     *
     * @param StartSessionRequest $request
     * @return SessionResponse
     *
     * @throws ReflectionException
     */
    public function startSession(StartSessionRequest $request): SessionResponse
    {
        $url = sprintf("%s/api/v1/cit", $this->baseUrl);

        $response = Http::contentType("application/json")
            ->accept('application/json')
            ->withHeaders([
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])
            ->post($url, $request->toArray());

        // Bail with error response if something went wrong
        if ($response->failed()) {
            return SessionResponse::errorResponse($response->body(), $response->status());
        }

        return JsonMapper::map($response->body(), SessionResponse::class);
    }

    /**
     * Makes request to create an account
     *
     * @param CreateAccountRequest $request
     * @return AccountResponse
     *
     * @throws ReflectionException
     */
    public function createAccount(CreateAccountRequest $request): AccountResponse
    {
        $url = sprintf("%s/api/v1/accounts", $this->baseUrl);

        $response = Http::contentType("application/json")
            ->accept('application/json')
            ->withHeaders([
                'Accept'        => 'application/json',
                'Authorization' => 'bearer: ' . $this->apiKey,
            ])
            ->post($url, $request->toArray());

        // Bail with error response if something went wrong
        if ($response->failed()) {
            return AccountResponse::errorResponse($response->body(), $response->status());
        }

        return JsonMapper::map($response->body(), AccountResponse::class);
    }
}
