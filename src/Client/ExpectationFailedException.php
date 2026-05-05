<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — a previously-stated expectation (precondition declared up-front by the caller)
 * could not be met by the system. Semantically aligned with HTTP 417 Expectation Failed.
 *
 * Extend when: a specific expectation contract in your domain is violated (e.g. a saga step
 * declared an invariant that the next step could not honour).
 */
class ExpectationFailedException extends AbstractBaseException
{
    protected $message = 'The operation failed due to a previous Expectation not being met.';
    protected $code = 417;
}
