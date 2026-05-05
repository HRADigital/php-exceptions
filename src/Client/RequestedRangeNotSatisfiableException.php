<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the range / window requested by the caller cannot be satisfied against the
 * current resource (e.g. pagination offset past the end of the dataset, byte-range outside the
 * file size, time-range outside the data retention window). Semantically aligned with HTTP 416
 * Range Not Satisfiable.
 *
 * Extend when: a domain has range-bounded operations with their own semantics
 * (e.g. `ReportPeriodOutsideRetentionException`, `PageBeyondResultSetException`).
 */
class RequestedRangeNotSatisfiableException extends AbstractBaseException
{
    protected $message = "The requested range for the operation you're trying to perform, is not satisfiable.";
    protected $code = 416;
}
