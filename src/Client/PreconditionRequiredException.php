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
 * Domain exception — the action requires the caller to supply a precondition (typically to avoid
 * the "lost update" problem) and none was supplied. Semantically aligned with HTTP 428 Precondition
 * Required.
 *
 * Use {@see PreconditionFailedException} instead when a precondition WAS supplied but evaluated
 * to false.
 *
 * Extend when: a domain mandates explicit concurrency tokens on specific commands
 * (e.g. `AggregateVersionRequiredException`).
 */
class PreconditionRequiredException extends AbstractBaseException
{
    protected $message = 'A given required precondition evaluated to false on the system.';
    protected $code = 428;
}
