<?php

declare(strict_types=1);

namespace Kerox\Messenger\Model\Callback;

class Delivery
{
    /**
     * @var int
     */
    protected $watermark;

    /**
     * @var int|null
     */
    protected $sequence;

    /**
     * @var array
     */
    protected $messageIds;

    /**
     * Delivery constructor.
     *
     * @param array    $messageIds
     * @param int      $watermark
     * @param int|null $sequence
     */
    public function __construct(int $watermark, ?int $sequence, array $messageIds = [])
    {
        $this->watermark = $watermark;
        $this->sequence = $sequence;
        $this->messageIds = $messageIds;
    }

    /**
     * @return int
     */
    public function getWatermark(): int
    {
        return $this->watermark;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return array
     */
    public function getMessageIds(): array
    {
        return $this->messageIds;
    }

    /**
     * @param array $callbackData
     *
     * @return \Kerox\Messenger\Model\Callback\Delivery
     */
    public static function create(array $callbackData): self
    {
        $messageIds = $callbackData['mids'] ?? [];

        return new self($callbackData['watermark'], $callbackData['seq'] ?? null, $messageIds);
    }
}
