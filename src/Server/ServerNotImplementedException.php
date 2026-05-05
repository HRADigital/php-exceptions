<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system does not (yet) support the requested capability; the operation
 * is recognised but no implementation exists for it. Semantically aligned with HTTP 501 Not
 * Implemented.
 *
 * Useful as a placeholder for stubbed-out operations on a contract during incremental rollouts.
 *
 * Extend when: a specific feature has its own "not implemented" semantics
 * (e.g. `ProviderCapabilityNotImplementedException` for an adapter that only implements part of
 * a port's contract).
 */
class ServerNotImplementedException extends AbstractBaseException
{
    protected $message = 'The server does not support the functionality required to fulfill the request.';
    protected $code = 501;
}
