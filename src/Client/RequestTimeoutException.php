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
 * Domain exception — the caller did not produce its input within the time the system was willing
 * to wait (idle command pipeline, stalled upload, abandoned multi-step flow). Semantically aligned
 * with HTTP 408 Request Timeout.
 *
 * Use {@see \HraDigital\Components\Exceptions\Server\GatewayTimeoutException} when an *upstream*
 * dependency timed out, not the caller.
 *
 * Extend when: a specific multi-step flow has its own abandonment semantics
 * (e.g. `CheckoutSessionExpiredException`, `UploadStalledException`).
 *
 * Browser behaviour (HTTP analog): some browsers transparently retry idempotent requests on 408.
 */
class RequestTimeoutException extends AbstractBaseException
{
    protected $message = 'The caller did not produce a request within the time the system was willing to wait.';
    protected $code = 408;
}
