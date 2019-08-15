<?php

declare(strict_types=1);

namespace Kerox\Messenger\Model\Message;

use Kerox\Messenger\Exception\InvalidTypeException;
use Kerox\Messenger\Helper\ValidatorTrait;

class QuickReply implements \JsonSerializable
{
    use ValidatorTrait;

    public const CONTENT_TYPE_TEXT = 'text';
    public const CONTENT_TYPE_PHONE = 'user_phone_number';
    public const CONTENT_TYPE_EMAIL = 'user_email';

    /** @deprecated */
    public const CONTENT_TYPE_LOCATION = 'location';

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $payload;

    /**
     * @var string|null
     */
    protected $imageUrl;

    /**
     * QuickReply constructor.
     *
     * @param string $contentType
     *
     * @throws \Exception
     */
    public function __construct(string $contentType = self::CONTENT_TYPE_TEXT)
    {
        $this->isValidContentType($contentType);

        $this->contentType = $contentType;
    }

    /**
     * @param string $contentType
     *
     * @throws \Exception
     *
     * @return \Kerox\Messenger\Model\Message\QuickReply
     */
    public static function create(string $contentType = self::CONTENT_TYPE_TEXT): self
    {
        return new self($contentType);
    }

    /**
     * @param string $title
     *
     * @throws \Exception
     *
     * @return \Kerox\Messenger\Model\Message\QuickReply
     */
    public function setTitle(string $title): self
    {
        $this->checkContentType();
        $this->isValidString($title, 20);

        $this->title = $title;

        return $this;
    }

    /**
     * @param string $payload
     *
     * @throws \Exception
     *
     * @return \Kerox\Messenger\Model\Message\QuickReply
     */
    public function setPayload(string $payload): self
    {
        $this->checkContentType();
        $this->isValidString($payload, 1000);

        $this->payload = $payload;

        return $this;
    }

    /**
     * @param string $imageUrl
     *
     * @throws \Exception
     *
     * @return \Kerox\Messenger\Model\Message\QuickReply
     */
    public function setImageUrl(string $imageUrl): self
    {
        $this->checkContentType();
        $this->isValidUrl($imageUrl);
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @param string $contentType
     *
     * @throws \Kerox\Messenger\Exception\InvalidTypeException
     */
    private function isValidContentType(string $contentType): void
    {
        $allowedContentType = $this->getAllowedContentType();
        if (!\in_array($contentType, $allowedContentType, true)) {
            throw new InvalidTypeException('Invalid content type.');
        }
    }

    /**
     * @return array
     */
    private function getAllowedContentType(): array
    {
        return [
            self::CONTENT_TYPE_TEXT,
            self::CONTENT_TYPE_LOCATION,
            self::CONTENT_TYPE_PHONE,
            self::CONTENT_TYPE_EMAIL,
        ];
    }

    /**
     * @throws \Kerox\Messenger\Exception\InvalidTypeException
     */
    private function checkContentType(): void
    {
        if ($this->contentType !== self::CONTENT_TYPE_TEXT) {
            throw new InvalidTypeException('Content type must be set to text to use title, payload and image_url.');
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $quickReply = [
            'content_type' => $this->contentType,
            'title' => $this->title,
            'payload' => $this->payload,
            'image_url' => $this->imageUrl,
        ];

        return array_filter($quickReply);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
