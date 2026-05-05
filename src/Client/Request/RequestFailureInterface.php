<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client\Request;

/**
 * Contract for exceptions that expose structured per-field validation failures.
 */
interface RequestFailureInterface
{
    /**
     * Failed input rules, keyed by field name.
     */
    public function getFailures(): array;

    /**
     * Human-readable reasons for each failure, keyed by field name.
     */
    public function getFailedMessages(): array;
}
