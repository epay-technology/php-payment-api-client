<?php

namespace Epay\PaymentClient\Requests;

class CreateAccountRequest implements Request
{
    public ?string $owner_first_name = null;
    public ?string $owner_last_name = null;

    /**
     * Constructor
     *
     * @param string $account_name
     * @param string $owner_email
     */
    public function __construct(
        public string $account_name,
        public string $owner_email,
    ){}

    /**
     * Sets the owners first name
     *
     * @param string $firstName
     *
     * @return $this
     */
    public function setOwnerFirstName(string $firstName)
    {
        $this->owner_first_name = $firstName;

        return $this;
    }

    /**
     * Sets the owners last name
     *
     * @param string $lastName
     *
     * @return $this
     */
    public function setOwnerLastName(string $lastName)
    {
        $this->owner_last_name = $lastName;

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
            "account_name"     => $this->account_name,
            "owner_email"      => $this->owner_email,
        ];

        // Add first name of owner if set
        if ($this->owner_first_name != null) {
            $data = array_merge($data, [
                'owner_first_name' => $this->owner_first_name,
            ]);
        }

        // Add last name of owner if set
        if ($this->owner_last_name != null) {
            $data = array_merge($data, [
                'owner_last_name' => $this->owner_last_name,
            ]);
        }

        return $data;
    }
}