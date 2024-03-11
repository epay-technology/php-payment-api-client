<?php

namespace Epay\PaymentClient\Requests;

class GetAccountsRequest implements Request
{
    /**
     * Constructor
     */
    public function __construct(){}

    /**
     * Converts all properties to an array representation
     *
     * @return array
     */
    public function toArray(): array
    {
        return [];
    }
}