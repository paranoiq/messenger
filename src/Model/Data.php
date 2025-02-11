<?php

declare(strict_types=1);

namespace Kerox\Messenger\Model;

use Kerox\Messenger\Model\Data\Value;

class Data
{
    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $period;

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $tag;

    /**
     * @var string|null
     */
    protected $profilePictureUrl;

    /**
     * @var array
     */
    protected $data;

    /**
     * Data constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->period = $data['period'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->id = $data['id'] ?? null;
        $this->tag = $data['tag'] ?? null;
        $this->profilePictureUrl = $data['profile_picture_url'] ?? null;

        $this->setValues($data);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPeriod(): ?string
    {
        return $this->period;
    }

    /**
     * @return \Kerox\Messenger\Model\Data\Value[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $data
     *
     * @return \Kerox\Messenger\Model\Data
     */
    public function setValues(array $data): self
    {
        if (isset($data['values']) && !empty($data['values'])) {
            foreach ($data['values'] as $value) {
                $this->values[] = Value::create($value['value'], $value['end_time']);
            }
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @return string|null
     */
    public function getProfilePictureUrl(): ?string
    {
        return $this->profilePictureUrl;
    }

    /**
     * @param array $data
     *
     * @return \Kerox\Messenger\Model\Data
     */
    public static function create(array $data): self
    {
        return new self($data);
    }
}
