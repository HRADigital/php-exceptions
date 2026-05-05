<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — one or more preconditions stated by the caller evaluated to false against the
 * current state of the system (e.g. an optimistic-concurrency token / version did not match, an
 * `If-Match` ETag was stale). Semantically aligned with HTTP 412 Precondition Failed.
 *
 * Extend when: a domain models specific concurrency or ordering preconditions
 * (e.g. `StaleAggregateVersionException`, `EventOutOfSequenceException`).
 */
class PreconditionFailedException extends AbstractBaseException
{
    protected $message = 'A given precondition evaluated to false on the system.';
    protected $code = 412;
}
