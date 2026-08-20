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
 * Domain exception — the caller has exceeded the allowed invocation rate within the current
 * window (rate limit, quota, throttle). Semantically aligned with HTTP 429 Too Many Requests.
 *
 * Extend when: a domain has named quotas / limits (e.g. `DailyEmailQuotaExceededException`,
 * `ApiKeyRateLimitException`) so callers can react to each specifically.
 *
 * Browser behaviour (HTTP analog): when surfaced as 429 with a `Retry-After` header,
 * well-behaved clients (and several browser fetch stacks) honour the wait before retrying.
 */
class TooManyRequestsException extends AbstractBaseException
{
    protected $message = 'Too many requests have been made to the system.';
    protected $code = 429;
}
