<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system detected an infinite loop while processing the action (cyclic
 * dependency between aggregates, recursive saga step, mutually-triggering event handlers).
 * Semantically aligned with HTTP 508 Loop Detected.
 *
 * Extend when: a specific orchestration layer has its own cycle-detection semantics
 * (e.g. `SagaCycleDetectedException`, `EventHandlerLoopException`).
 */
class LoopDetectedException extends AbstractBaseException
{
    protected $message = 'The system detected an infinite loop while processing the action.';
    protected $code = 508;
}
