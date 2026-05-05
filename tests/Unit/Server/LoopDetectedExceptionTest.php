<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Server;

use HraDigital\Components\Exceptions\Server\LoopDetectedException;
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;

class LoopDetectedExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return LoopDetectedException::class;
    }

    protected function expectedParent(): string
    {
        return AbstractBaseException::class;
    }

    protected function expectedCode(): int
    {
        return 508;
    }
}
