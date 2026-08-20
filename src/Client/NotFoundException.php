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
use Throwable;

use function sprintf;

/**
 * Domain exception — the requested resource does not exist (or is intentionally hidden from the
 * caller for privacy / authorization reasons). Semantically aligned with HTTP 404 Not Found.
 *
 * Use {@see GoneException} instead when the resource existed and is permanently removed.
 *
 * Extend when: a specific aggregate / entity type benefits from its own miss type
 * (e.g. `UserNotFoundException`, `InvoiceNotFoundException`) so callers can catch it precisely.
 */
class NotFoundException extends AbstractBaseException
{
    protected $message = 'The resource you are looking for, was not found in the system.';
    protected $code = 404;

    /**
     * Build the exception with a message that includes the missing resource's ID.
     */
    public static function withId(int $id, ?Throwable $inner = null): static
    {
        return new static(
            sprintf('The resource with the ID %d you are looking for, was not found in the system.', $id),
            ['id' => $id],
            $inner,
        );
    }
}
