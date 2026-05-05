<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system cannot complete the action because it has run out of the storage
 * needed to persist the result (disk full, object-store quota exhausted, tenant storage cap
 * reached). Semantically aligned with HTTP 507 Insufficient Storage.
 *
 * Extend when: a specific storage subsystem has its own exhaustion semantics
 * (e.g. `TenantStorageQuotaExceededException`, `AttachmentStoreFullException`).
 */
class InsufficientStorageException extends AbstractBaseException
{
    protected $message = 'The system has insufficient storage to complete the action.';
    protected $code = 507;
}
