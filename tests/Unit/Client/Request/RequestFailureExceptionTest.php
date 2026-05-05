<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit\Client\Request;

use HraDigital\Components\Exceptions\Client\Request\RequestFailureException;
use HraDigital\Components\Exceptions\Client\Request\RequestFailureInterface;
use HraDigital\Components\Exceptions\Client\UnprocessableEntityException;
use HraDigital\Tests\Components\Exceptions\Unit\AbstractExceptionTestCase;
use RuntimeException;

class RequestFailureExceptionTest extends AbstractExceptionTestCase
{
    protected function exceptionClass(): string
    {
        return RequestFailureException::class;
    }

    protected function expectedParent(): string
    {
        return UnprocessableEntityException::class;
    }

    protected function expectedCode(): int
    {
        return 422;
    }

    public function testImplementsRequestFailureInterface(): void
    {
        $this->assertInstanceOf(RequestFailureInterface::class, new RequestFailureException());
    }

    public function testFailuresEmptyByDefault(): void
    {
        $exception = new RequestFailureException();

        $this->assertSame([], $exception->getFailures());
        $this->assertSame([], $exception->getFailedMessages());
    }

    public function testWithFailuresFactoryPopulatesFailures(): void
    {
        $failed = ['email' => 'unique', 'password' => 'min:8'];
        $messages = ['email' => 'Email is already taken.', 'password' => 'Too short.'];

        $exception = RequestFailureException::withFailures($failed, $messages);

        $this->assertSame($failed, $exception->getFailures());
        $this->assertSame($messages, $exception->getFailedMessages());
        $this->assertSame(RequestFailureException::DEFAULT_MESSAGE, $exception->getMessage());
    }

    public function testWithFailuresFactoryAcceptsInnerException(): void
    {
        $inner = new RuntimeException('cause');

        $exception = RequestFailureException::withFailures(['x' => 'y'], [], $inner);

        $this->assertSame($inner, $exception->getPrevious());
    }
}
