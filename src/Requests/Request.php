<?php

namespace Epay\PaymentClient\Requests;

interface Request
{
    /**
     * Converts all properties to an array representation
     *
     * @return array
     */
    public function toArray(): array;
}