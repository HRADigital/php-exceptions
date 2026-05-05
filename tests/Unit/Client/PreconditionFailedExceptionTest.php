<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Client;

use HraDigital\Components\Exceptions\Client\PreconditionFailedException;
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;

class PreconditionFailedExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return PreconditionFailedException::class;
    }

    protected function expectedParent(): string
    {
        return AbstractBaseException::class;
    }

    protected function expectedCode(): int
    {
        return 412;
    }
}
