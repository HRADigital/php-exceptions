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
 * Domain exception — the operation invoked is not supported by the target resource in its current
 * shape (e.g. attempting to mutate a read-only projection, calling a write command on an immutable
 * aggregate). Semantically aligned with HTTP 405 Method Not Allowed.
 *
 * Extend when: a specific aggregate exposes a closed set of operations and a caller invokes one
 * outside that set (e.g. `OrderAlreadyShippedException` when `cancel()` is called on a shipped order).
 */
class MethodNotAllowedException extends AbstractBaseException
{
    protected $message = 'The action failed due using a request method not supported by that resource.';
    protected $code = 405;
}
