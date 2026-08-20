<?php

/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 *
 * Copyright (c) HRADigital - Hugo Rafael Azevedo.
 */

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client\Request;

/**
 * Contract for exceptions that expose structured per-field validation failures.
 */
interface RequestFailureInterface
{
    /**
     * Failed input rules, keyed by field name.
     */
    public function getFailures(): array;

    /**
     * Human-readable reasons for each failure, keyed by field name.
     */
    public function getFailedMessages(): array;
}
