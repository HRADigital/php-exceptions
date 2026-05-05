<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the action arrived before the system was willing to process it (replay-risk
 * window not yet closed, scheduled action invoked before its activation time, eventual-consistency
 * read attempted before the projection caught up). Semantically aligned with HTTP 425 Too Early.
 *
 * Extend when: a domain has named timing gates (e.g. `ScheduledActionNotYetDueException`,
 * `ProjectionNotCaughtUpException`).
 */
class TooEarlyException extends AbstractBaseException
{
    protected $message = 'The action was attempted before the system was willing to process it.';
    protected $code = 425;
}
