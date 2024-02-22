<?php

class AccountOwner
{
    public function __construct(
        private string $name,
        private string $email,
        private string $contact,
    ) {
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of contact
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * Set the value of contact
     */
    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }
}
