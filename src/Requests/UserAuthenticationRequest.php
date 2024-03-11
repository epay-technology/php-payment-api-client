<?php

namespace Epay\PaymentClient\Requests;

class UserAuthenticationRequest implements Request
{
    /**
     * Constructor
     *
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $password,
    ){}

    /**
     * Converts all properties to an array representation
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email'    => $this->email,
            'password' => $this->password,
        ];
    }
}