<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Client;

use HraDigital\Components\Exceptions\Client\UnsupportedMediaTypeException;
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;

class UnsupportedMediaTypeExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return UnsupportedMediaTypeException::class;
    }

    protected function expectedParent(): string
    {
        return AbstractBaseException::class;
    }

    protected function expectedCode(): int
    {
        return 415;
    }
}
