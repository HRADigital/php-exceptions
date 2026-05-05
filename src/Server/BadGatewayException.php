<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — while acting as an intermediary (gateway, proxy, anti-corruption adapter),
 * the system received an invalid / malformed response from an upstream dependency
 * (third-party API, downstream service). Semantically aligned with HTTP 502 Bad Gateway.
 *
 * Extend when: a specific upstream has its own contract violation type
 * (e.g. `PaymentProviderInvalidResponseException`, `IdpMalformedTokenException`).
 */
class BadGatewayException extends AbstractBaseException
{
    protected $message = 'The server, received an invalid response from an inbound server.';
    protected $code = 502;
}
