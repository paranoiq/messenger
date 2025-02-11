<?php

declare(strict_types=1);

namespace Kerox\Messenger\Model\Common;

class Address implements \JsonSerializable
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string|null
     */
    protected $additionalStreet;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var int|null
     */
    protected $id;

    /**
     * Address constructor.
     *
     * @param string $street
     * @param string $city
     * @param string $postalCode
     * @param string $state
     * @param string $country
     */
    public function __construct(
        string $street,
        string $city,
        string $postalCode,
        string $state,
        string $country
    ) {
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->state = $state;
        $this->country = $country;
    }

    /**
     * @param string $street
     * @param string $city
     * @param string $postalCode
     * @param string $state
     * @param string $country
     *
     * @return \Kerox\Messenger\Model\Common\Address
     */
    public static function create(
        string $street,
        string $city,
        string $postalCode,
        string $state,
        string $country
    ): self {
        return new self($street, $city, $postalCode, $state, $country);
    }

    /**
     * @param string $name
     *
     * @return \Kerox\Messenger\Model\Common\Address
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $additionalStreet
     *
     * @return Address
     */
    public function setAdditionalStreet(string $additionalStreet): self
    {
        $this->additionalStreet = $additionalStreet;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdditionalStreet(): ?string
    {
        return $this->additionalStreet;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param int $id
     *
     * @return Address
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [
            'name' => $this->name,
            'street_1' => $this->street,
            'street_2' => $this->additionalStreet,
            'city' => $this->city,
            'postal_code' => $this->postalCode,
            'state' => $this->state,
            'country' => $this->country,
            'id' => $this->id,
        ];

        return array_filter($array);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @param array $payload
     *
     * @return \Kerox\Messenger\Model\Common\Address
     */
    public static function fromPayload(array $payload): self
    {
        $address = self::create(
            $payload['street_1'],
            $payload['city'],
            $payload['postal_code'],
            $payload['state'],
            $payload['country']
        );

        if (isset($payload['street_2'])) {
            $address->setAdditionalStreet($payload['street_2']);
        }

        if (isset($payload['id'])) {
            $address->setId($payload['id']);
        }

        if (isset($payload['name'])) {
            $address->setName($payload['name']);
        }

        return $address;
    }
}
