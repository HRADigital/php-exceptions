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
 * Domain exception — the input is syntactically malformed or otherwise unparseable
 * (missing required fields, wrong types, broken JSON/XML structure). Semantically aligned with
 * HTTP 400 Bad Request.
 *
 * Use {@see UnprocessableEntityException} instead when the input parses correctly but breaks a
 * domain rule.
 *
 * Extend when: a specific input shape has a recurring malformation pattern
 * (e.g. `MalformedCommandPayloadException`).
 */
class BadRequestException extends AbstractBaseException
{
    protected $message = 'The request could not be understood due to malformed syntax.';
    protected $code = 400;
}
