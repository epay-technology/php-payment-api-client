<?php

namespace Epay\PaymentClient\Responses;

class SessionResponse extends Response
{
    public string $session_id;
    public int $amount;
    public string $currency;
    public string $reference;
    public string $payment_id;
    public int $timeout;
    public string $url_pan;
    public string $url_expiry_month;
    public string $url_expiry_year;
    public string $url_security_code;
    public string $id_pan;
    public string $id_expiry_month;
    public string $id_expiry_year;
    public string $id_security_code;
}