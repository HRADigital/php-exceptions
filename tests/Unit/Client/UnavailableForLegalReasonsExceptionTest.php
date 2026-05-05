<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Client;

use HraDigital\Components\Exceptions\Client\UnavailableForLegalReasonsException;
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;

class UnavailableForLegalReasonsExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return UnavailableForLegalReasonsException::class;
    }

    protected function expectedParent(): string
    {
        return AbstractBaseException::class;
    }

    protected function expectedCode(): int
    {
        return 451;
    }
}
