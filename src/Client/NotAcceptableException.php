<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system cannot produce a representation/result that matches the
 * constraints stated by the caller (in HTTP this is the `Accept` headers; in a domain context
 * it may be a requested format, locale, currency, or projection that the system does not support
 * for the target resource). Semantically aligned with HTTP 406 Not Acceptable.
 *
 * Extend when: a domain explicitly negotiates outputs (e.g. `ReportFormatNotSupportedException`,
 * `LocaleNotSupportedException`).
 */
class NotAcceptableException extends AbstractBaseException
{
    protected $message = "The operation you're trying to perform, is not acceptable.";
    protected $code = 406;
}
