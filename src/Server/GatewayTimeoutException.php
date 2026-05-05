<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — while acting as an intermediary (gateway, proxy, anti-corruption adapter),
 * the system did not receive a timely response from an upstream dependency. Semantically aligned
 * with HTTP 504 Gateway Timeout.
 *
 * Use this — not {@see ServerUnavailableException} — when the failure is on the *upstream* side
 * of an intermediary, not on the system itself.
 *
 * Extend when: a specific upstream has its own SLA / timeout semantics
 * (e.g. `PaymentProviderTimeoutException`, `EmailProviderTimeoutException`).
 */
class GatewayTimeoutException extends AbstractBaseException
{
    protected $message = 'The server did not receive a timely response from an upstream server.';
    protected $code = 504;
}
