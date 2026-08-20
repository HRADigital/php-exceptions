<?php

/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 *
 * Copyright (c) HRADigital - Hugo Rafael Azevedo.
 */

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Server;

use HraDigital\Components\Exceptions\AbstractBaseException;

/**
 * Domain exception — the system detected an infinite loop while processing the action (cyclic
 * dependency between aggregates, recursive saga step, mutually-triggering event handlers).
 * Semantically aligned with HTTP 508 Loop Detected.
 *
 * Extend when: a specific orchestration layer has its own cycle-detection semantics
 * (e.g. `SagaCycleDetectedException`, `EventHandlerLoopException`).
 */
class LoopDetectedException extends AbstractBaseException
{
    protected $message = 'The system detected an infinite loop while processing the action.';
    protected $code = 508;
}
