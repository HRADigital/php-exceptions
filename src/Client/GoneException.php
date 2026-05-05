<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;
use Throwable;

use function sprintf;

/**
 * Domain exception — the requested resource existed but is permanently gone (deleted, archived
 * beyond retention, tombstoned) and will not return. Semantically aligned with HTTP 410 Gone.
 *
 * Prefer this over {@see NotFoundException} when the absence is intentional and permanent —
 * downstream callers can treat it as terminal and stop retrying / re-resolving.
 *
 * Extend when: a domain has a specific lifecycle end-state (e.g. `OrderArchivedException`,
 * `AccountPurgedException`).
 */
class GoneException extends AbstractBaseException
{
    protected $message = 'The resource you are looking for, is no longer available in the system.';
    protected $code = 410;

    /**
     * Build the exception with a message that includes the gone resource's ID.
     */
    public static function withId(int $id, ?Throwable $inner = null): static
    {
        return new static(
            sprintf('The resource with the ID %d no longer exists in the system.', $id),
            ['id' => $id],
            $inner,
        );
    }
}
