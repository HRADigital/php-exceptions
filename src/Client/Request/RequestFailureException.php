<?php

/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 *
 * Copyright (c) HRADigital - Hugo Rafael Azevedo.
 */

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client\Request;

use HraDigital\Components\Exceptions\Client\UnprocessableEntityException;
use Throwable;

/**
 * Domain exception — specialisation of {@see UnprocessableEntityException} that carries structured
 * per-field validation failures alongside the message. Use it when the domain layer wants to
 * surface field-level errors so the transport boundary (HTTP, RPC, CLI) can format them for the
 * caller. Semantically aligned with HTTP 422 Unprocessable Entity.
 *
 * Extend when: a specific input shape has its own field-error semantics
 * (e.g. `RegistrationRequestFailureException` that always reports the standard `email`/`password`
 * field set).
 *
 * @phpstan-consistent-constructor
 */
class RequestFailureException extends UnprocessableEntityException implements RequestFailureInterface
{
    public const DEFAULT_MESSAGE = 'Request payload validation failed.';

    private array $failed;
    private array $failedMessages;

    /**
     * @internal Use {@see self::withFailures()} to build instances.
     */
    public function __construct(
        ?string $message = null,
        array $data = [],
        ?Throwable $inner = null,
        array $failed = [],
        array $failedMessages = [],
    ) {
        parent::__construct($message, $data, $inner);
        $this->failed = $failed;
        $this->failedMessages = $failedMessages;
    }

    /**
     * Build the exception from a list of failed fields and per-field error messages.
     *
     * @param array $failed   Failed input field rules, keyed by field name.
     * @param array $messages Human-readable reasons, keyed by field name.
     */
    public static function withFailures(array $failed, array $messages = [], ?Throwable $inner = null): static
    {
        return new static(
            static::DEFAULT_MESSAGE,
            [],
            $inner,
            $failed,
            $messages,
        );
    }

    final public function getFailures(): array
    {
        return $this->failed;
    }

    final public function getFailedMessages(): array
    {
        return $this->failedMessages;
    }
}
