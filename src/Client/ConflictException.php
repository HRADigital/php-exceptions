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
 * Domain exception — the action could not be completed because it conflicts with the current state
 * of the target aggregate/resource (e.g. duplicate identity, optimistic-locking version mismatch,
 * cascade-delete refused). Semantically aligned with HTTP 409 Conflict.
 *
 * Extend when: you need a context-specific conflict (e.g. `DuplicateEmailException`,
 * `AggregateVersionMismatchException`).
 */
class ConflictException extends AbstractBaseException
{
    protected $message = 'The action failed due to a conflict in the provided request.';
    protected $code = 409;
}
