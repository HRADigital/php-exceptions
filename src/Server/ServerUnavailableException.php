<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system is temporarily unable to handle the operation (overload,
 * maintenance window, circuit breaker open, dependency degraded). The condition is expected to
 * be transient and the caller may retry. Semantically aligned with HTTP 503 Service Unavailable.
 *
 * Use this — not {@see GatewayTimeoutException} — when the system itself is the failure point,
 * not an upstream behind it.
 *
 * Extend when: a specific subsystem has named unavailability modes
 * (e.g. `MaintenanceWindowException`, `CircuitBreakerOpenException`).
 *
 * Browser behaviour (HTTP analog): when surfaced as 503 with a `Retry-After` header,
 * well-behaved clients (and several browser fetch stacks) honour the wait before retrying.
 */
class ServerUnavailableException extends AbstractBaseException
{
    protected $message = 'The server is temporarily unable to handle the request.';
    protected $code = 503;
}
