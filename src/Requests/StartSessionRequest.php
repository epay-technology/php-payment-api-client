<?php

namespace Epay\PaymentClient\Requests;

class StartSessionRequest implements Request
{
    public ?string $payment_id = null;
    public ?string $parent_payment_id = null;

    /**
     * Constructor
     *
     * @param string $merchantId
     * @param int $amount
     * @param string $currency
     * @param int $timeout
     */
    public function __construct(
        public string $merchantId,
        public int $amount,
        public string $currency,
        public int $timeout
    ){}

    /**
     * Forces the use of a specific payment id
     *
     * @param string $paymentId
     *
     * @return $this
     */
    public function forcePaymentId(string $paymentId)
    {
        $this->payment_id = $paymentId;

        return $this;
    }

    /**
     * Bases the payment on another payment
     *
     * @param string $paymentId
     *
     * @return $this
     */
    public function basedOnPaymentId(string $paymentId)
    {
        $this->parent_payment_id = $paymentId;

        return $this;
    }

    /**
     * Converts all properties to an array representation
     *
     * @return array
     */
    public function toArray(): array
    {
        // Build up the initial data
        $data = [
            "merchant_id" => $this->merchantId,
            "amount"      => $this->amount,
            "currency"    => $this->currency,
            "timeout"     => $this->timeout,
        ];

        // Add payment id if set
        if ($this->payment_id != null) {
            $data = array_merge($data, [
                'payment_id' => $this->payment_id,
            ]);
        }

        // Add parent if set
        if ($this->parent_payment_id != null) {
            $data = array_merge($data, [
                'parent_payment_id' => $this->parent_payment_id,
            ]);
        }

        return $data;
    }
}