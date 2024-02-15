<?php

namespace Epay\PaymentClient\Responses;

abstract class Response
{
    /**
     * Holds all the information related to the response
     *
     * @var array $responseInformation
     */
    protected array $responseInformation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responseInformation = [
            'is_successful' => true,
            'error_message' => null,
            'status_code'   => 200,
        ];
    }

    /**
     * Tells if the response came back successful
     *
     * @return bool
     */
    public function succeeded()
    {
        return $this->responseInformation['is_successful'];
    }

    /**
     * Tells if the response came back unsuccessful
     *
     * @return bool
     */
    public function failed()
    {
        return ! $this->succeeded();
    }

    /**
     * Gets the current error message of the response
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->responseInformation['error_message'];
    }

    /**
     * Named constructor for generating error response
     *
     * @param string $errorMessage
     * @param int $statusCode
     *
     * @return static
     */
    public static function errorResponse(string $errorMessage, int $statusCode): static
    {
        $response = new static;
        $response->responseInformation['is_successful'] = false;
        $response->responseInformation['error_message'] = $errorMessage;
        $response->responseInformation['status_code'] = $statusCode;

        return $response;
    }
}