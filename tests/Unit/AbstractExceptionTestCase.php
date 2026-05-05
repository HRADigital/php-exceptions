<?php

declare(strict_types=1);

namespace HraDigital\Tests\Components\Exceptions\Unit;

use HraDigital\Components\Exceptions\AbstractBaseException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

abstract class AbstractExceptionTestCase extends TestCase
{
    /** @return class-string<AbstractBaseException> */
    abstract protected function exceptionClass(): string;

    /** @return class-string */
    abstract protected function expectedParent(): string;

    abstract protected function expectedCode(): int;

    public function testExtendsExpectedParent(): void
    {
        $class = $this->exceptionClass();
        $this->assertTrue(
            \is_subclass_of($class, $this->expectedParent()),
            "{$class} must extend {$this->expectedParent()}",
        );
    }

    public function testExtendsAbstractBaseException(): void
    {
        $this->assertTrue(\is_subclass_of($this->exceptionClass(), AbstractBaseException::class));
    }

    public function testCodeMatchesExpectedHttpStatus(): void
    {
        $class = $this->exceptionClass();
        $exception = new $class();

        $this->assertSame($this->expectedCode(), $exception->getCode());
    }

    public function testHasNoDataByDefault(): void
    {
        $class = $this->exceptionClass();
        $exception = new $class();

        $this->assertFalse($exception->hasData());
        $this->assertSame([], $exception->getData());
    }

    public function testCarriesProvidedData(): void
    {
        $class = $this->exceptionClass();
        $data = ['field' => 'email', 'reason' => 'duplicate', 'count' => 3];
        $exception = new $class('overridden message', $data);

        $this->assertTrue($exception->hasData());
        $this->assertSame($data, $exception->getData());
    }

    public function testAcceptsInnerException(): void
    {
        $class = $this->exceptionClass();
        $inner = new RuntimeException('underlying cause');
        $exception = new $class(null, [], $inner);

        $this->assertSame($inner, $exception->getPrevious());
    }

    public function testUsesDefaultMessageWhenNotProvided(): void
    {
        $class = $this->exceptionClass();
        $exception = new $class();

        $this->assertNotSame('', $exception->getMessage());
    }

    public function testOverridesDefaultMessageWhenProvided(): void
    {
        $class = $this->exceptionClass();
        $exception = new $class('custom message');

        $this->assertSame('custom message', $exception->getMessage());
    }
}
