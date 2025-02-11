<?php

declare(strict_types=1);

namespace Kerox\Messenger\Response;

class SendResponse extends AbstractResponse
{
    private const RECIPIENT_ID = 'recipient_id';
    private const MESSAGE_ID = 'message_id';
    private const ATTACHMENT_ID = 'attachment_id';

    private const ERROR = 'error';
    private const ERROR_MESSAGE = 'message';
    private const ERROR_TYPE = 'type';
    private const ERROR_CODE = 'code';
    private const ERROR_SUBCODE = 'error_subcode';
    private const ERROR_FBTRACE_ID = 'fbtrace_id';

    /**
     * @var string|null
     */
    protected $recipientId;

    /**
     * @var string|null
     */
    protected $messageId;

    /**
     * @var string|null
     */
    protected $attachmentId;

    /**
     * @var string|null
     */
    protected $errorMessage;

    /**
     * @var string|null
     */
    protected $errorType;

    /**
     * @var int|null
     */
    protected $errorCode;

    /**
     * @var int|null
     */
    protected $errorSubcode;

    /**
     * @var string|null
     */
    protected $errorFbtraceId;

    /**
     * @param array $response
     */
    protected function parseResponse(array $response): void
    {
        if (!$this->hasError($response)) {
            $this->recipientId = $response[self::RECIPIENT_ID] ?? null;
            $this->messageId = $response[self::MESSAGE_ID] ?? null;
            $this->attachmentId = $response[self::ATTACHMENT_ID] ?? null;
        }
    }

    /**
     * @param array $response
     *
     * @return bool
     */
    private function hasError(array $response): bool
    {
        if (isset($response[self::ERROR])) {
            $this->errorMessage = $response[self::ERROR][self::ERROR_MESSAGE] ?? null;
            $this->errorType = $response[self::ERROR][self::ERROR_TYPE] ?? null;
            $this->errorCode = $response[self::ERROR][self::ERROR_CODE] ?? null;
            $this->errorSubcode = $response[self::ERROR][self::ERROR_SUBCODE] ?? null;
            $this->errorFbtraceId = $response[self::ERROR][self::ERROR_FBTRACE_ID] ?? null;

            return true;
        }

        return false;
    }

    /**
     * @return string|null
     */
    public function getRecipientId(): ?string
    {
        return $this->recipientId;
    }

    /**
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }

    /**
     * @return string|null
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @return string|null
     */
    public function getErrorType(): ?string
    {
        return $this->errorType;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @return int|null
     */
    public function getErrorSubcode(): ?int
    {
        return $this->errorSubcode;
    }

    /**
     * @return string|null
     */
    public function getErrorFbtraceId(): ?string
    {
        return $this->errorFbtraceId;
    }
}
