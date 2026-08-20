<?php

/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 *
 * Copyright (c) HRADigital - Hugo Rafael Azevedo.
 */

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the target resource is locked and cannot accept the requested mutation
 * (pessimistic lock held by another actor, aggregate frozen for audit, account locked after
 * repeated failed logins). Semantically aligned with HTTP 423 Locked.
 *
 * Use {@see ConflictException} when the issue is a state mismatch rather than an explicit lock.
 *
 * Extend when: a domain has named locking semantics (e.g. `AccountLockedException`,
 * `RecordCheckedOutException`, `LedgerPeriodClosedException`).
 */
class LockedException extends AbstractBaseException
{
    protected $message = 'The target resource is currently locked and cannot be modified.';
    protected $code = 423;
}
