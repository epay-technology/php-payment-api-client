<?php

namespace Epay\PaymentClient\Requests;

class GetAccountRequest implements Request
{
    /**
     * Constructor
     */
    public function __construct(
        public int $accountId,
    ){}

    /**
     * Converts all properties to an array representation
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId,
        ];
    }
}