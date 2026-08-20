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
 * Domain exception — the operation is gated by a payment / billing condition that has not been
 * satisfied (subscription expired, plan does not include the feature, account in arrears, prepaid
 * credit exhausted). Semantically aligned with HTTP 402 Payment Required.
 *
 * Extend when: a domain has named billing gates (e.g. `SubscriptionExpiredException`,
 * `FeatureNotIncludedInPlanException`, `AccountSuspendedForNonPaymentException`).
 */
class PaymentRequiredException extends AbstractBaseException
{
    protected $message = 'The action requires payment or a valid subscription to proceed.';
    protected $code = 402;
}
