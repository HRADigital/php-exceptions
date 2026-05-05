<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the requested action could not be performed because a prerequisite action
 * (a previous step in a process, a parent aggregate operation, an external dependency)
 * failed. Semantically aligned with HTTP 424 Failed Dependency.
 *
 * Extend when: a specific dependency in your domain has its own failure semantics
 * (e.g. `PaymentDependencyFailedException` for an order that cannot complete because billing failed).
 */
class FailedDependencyException extends AbstractBaseException
{
    protected $message = 'The action failed due to failure of a previous action.';
    protected $code = 424;
}
