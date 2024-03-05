<?php

namespace Epay\PaymentClient\Responses;

class AccountResponse extends Response
{
    public bool $success;
    public string $message;
    public string $password;
}