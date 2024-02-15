<?php

namespace Epay\PaymentClient;

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

        $response = Http::contentType("application/json")->accept("application/json")->post($url, $request->toArray());

        // Bail with error response if something went wrong
        if ($response->failed()) {
            return SessionResponse::errorResponse('Failed to create new session', 500);
        }

        return JsonMapper::map($response->body(), SessionResponse::class);
    }
}