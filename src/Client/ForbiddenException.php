<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the action was understood but is refused. The caller is authenticated but
 * lacks permission, or the action is prohibited regardless of identity. Repeating the action will
 * not change the outcome. Semantically aligned with HTTP 403 Forbidden.
 *
 * Extend when: you need a domain-specific authorization failure (e.g. `TenantIsolationViolationException`,
 * `RoleMissingException`, `AccountSuspendedException`).
 *
 * Use this — not {@see DeniedAccessException} — when the caller IS authenticated but not allowed.
 */
class ForbiddenException extends AbstractBaseException
{
    protected $message = 'You were forbidden to access the resource you were looking for.';
    protected $code = 403;
}
