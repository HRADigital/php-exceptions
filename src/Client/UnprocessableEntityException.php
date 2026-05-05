<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;
use Throwable;

use function sprintf;

/**
 * Domain exception — the input is syntactically well-formed but fails semantic / business-rule
 * validation (e.g. an email is well-shaped but already registered, a date is parseable but in the
 * past, a value object's invariant is violated). Semantically aligned with HTTP 422 Unprocessable
 * Entity.
 *
 * Use this — not {@see \HraDigital\Components\Exceptions\Client\BadRequestException} — when the
 * input parses correctly but breaks domain rules.
 *
 * Extend when: a specific domain rule has its own failure type (e.g. `EmailAlreadyTakenException`,
 * `InsufficientFundsException`). For per-field validation collections, see
 * {@see Request\RequestFailureException}.
 */
class UnprocessableEntityException extends AbstractBaseException
{
    protected $message = 'The request was well-formed but was unable to be followed due to semantic errors.';
    protected $code = 422;

    /**
     * Build the exception with a message that names the offending field.
     */
    public static function withName(string $name, ?Throwable $inner = null): static
    {
        return new static(
            sprintf("The request was well-formed but was unable to be followed due to field '%s'.", $name),
            ['name' => $name],
            $inner,
        );
    }
}
