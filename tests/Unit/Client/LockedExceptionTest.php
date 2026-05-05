<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Client;

use HraDigital\Components\Exceptions\Client\LockedException;
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;

class LockedExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return LockedException::class;
    }

    protected function expectedParent(): string
    {
        return AbstractBaseException::class;
    }

    protected function expectedCode(): int
    {
        return 423;
    }
}
