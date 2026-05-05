<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions;

use DomainException;
use Throwable;

/**
 * Base class for every domain exception in this package.
 *
 * These are platform-agnostic domain exceptions. Their names and intent are aligned with HTTP
 * 4XX/5XX status codes for familiarity, but they are meant to be raised in the domain layer —
 * outside any HTTP transport — and translated to a transport-specific representation at the
 * boundary (controller, RPC handler, CLI presenter, etc.) when needed.
 *
 * Subclasses are expected to override `$message` (default human-readable text) and `$code`
 * (HTTP status code aligned with the exception's semantic intent).
 *
 * Extend when: you need a more specific domain error than the leaf classes already provide
 * (e.g. a bounded-context-specific specialisation of {@see Client\NotFoundException}).
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractBaseException extends DomainException
{
    protected $message = 'An unspecified error occurred on the server.';

    private array $data;

    public function __construct(?string $message = null, array $data = [], ?Throwable $inner = null)
    {
        parent::__construct($message ?? $this->message, $this->code, $inner);
        $this->data = $data;
    }

    /**
     * Arbitrary structured data attached to the exception when it was raised.
     */
    final public function getData(): array
    {
        return $this->data;
    }

    /**
     * Whether the exception was raised with any structured data attached.
     */
    final public function hasData(): bool
    {
        return $this->data !== [];
    }
}
