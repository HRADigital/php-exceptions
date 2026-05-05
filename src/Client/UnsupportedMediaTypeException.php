<?php

declare(strict_types=1);

namespace HraDigital\Components\Exceptions\Client;

use HraDigital\Components\Exceptions\AbstractBaseException;
use Throwable;

use function sprintf;

/**
 * Domain exception — the format / media type of the input is not supported by the target operation
 * (e.g. an upload arrives as XML where only JSON is accepted, an avatar arrives as `image/tiff`
 * where the domain only stores `image/png` and `image/jpeg`). Semantically aligned with HTTP 415
 * Unsupported Media Type.
 *
 * Extend when: a specific aggregate has a closed allow-list of formats
 * (e.g. `UnsupportedAvatarFormatException`, `UnsupportedDocumentEncodingException`).
 */
class UnsupportedMediaTypeException extends AbstractBaseException
{
    protected $message = 'The supplied MediaType is not supported by the system.';
    protected $code = 415;

    /**
     * Build the exception with a message that names the rejected media type.
     */
    public static function withName(string $name, ?Throwable $inner = null): static
    {
        return new static(
            sprintf("MediaType '%s' is not supported by the system.", $name),
            ['name' => $name],
            $inner,
        );
    }
}
