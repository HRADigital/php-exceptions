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
 * Domain exception — generic, unexpected system-side failure with no more specific cause
 * available (catch-all for "something went wrong on our side"). Semantically aligned with HTTP
 * 500 Internal Server Error.
 *
 * Prefer a more specific exception whenever possible — this one is a last resort and tends to
 * hide root causes from observability.
 *
 * Extend when: you've classified a recurring server-side failure that deserves its own type
 * (e.g. `EventPublishingFailedException`, `OutboxFlushFailedException`).
 */
class InternalServerErrorException extends AbstractBaseException
{
    protected $message = 'The server encountered an unexpected condition.';
    protected $code = 500;
}
