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
 * Domain exception — the caller is not authenticated; authentication is required and has either
 * failed or has not yet been provided. Semantically aligned with HTTP 401 Unauthorized.
 *
 * Extend when: you need to distinguish the authentication failure mode (e.g. `ExpiredTokenException`,
 * `InvalidCredentialsException`, `MfaRequiredException`).
 *
 * Browser behaviour (HTTP analog): when surfaced as 401 with a `WWW-Authenticate` header,
 * browsers display a native authentication dialog (Basic/Digest).
 */
class DeniedAccessException extends AbstractBaseException
{
    protected $message = "You don't have access to the resource you are looking for.";
    protected $code = 401;
}
