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
 * Domain exception — access to the resource is denied to satisfy a legal demand (court order,
 * regulator, geographic restriction, sanctions list). Semantically aligned with HTTP 451
 * Unavailable For Legal Reasons.
 *
 * Prefer this over {@see ForbiddenException} when the refusal is externally mandated, not a
 * domain authorization rule — auditors / compliance flows usually need to distinguish them.
 *
 * Extend when: a domain has a specific legal regime (e.g. `GdprErasureBlockException`,
 * `GeoRestrictedException`, `SanctionedPartyException`).
 *
 * Browser behaviour (HTTP analog): some browsers (e.g. Firefox) display a dedicated "blocked
 * for legal reasons" page when a 451 is received with a `Link: rel="blocked-by"` header.
 */
class UnavailableForLegalReasonsException extends AbstractBaseException
{
    protected $message = 'The server is denying access to the resource as a consequence of a legal demand.';
    protected $code = 451;
}
