<?php

namespace Epay\PaymentClient\Responses;

class UserAuthenticationResponse extends Response
{
    public bool $success;
    public string $token;
}