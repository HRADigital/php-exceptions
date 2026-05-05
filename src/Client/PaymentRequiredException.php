<?php

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
