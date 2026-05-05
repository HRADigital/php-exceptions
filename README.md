# php-exceptions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hradigital/php-exceptions.svg?style=flat-square)](https://packagist.org/packages/hradigital/php-exceptions)
[![CI](https://github.com/HRADigital/php-exceptions/actions/workflows/ci.yml/badge.svg)](https://github.com/HRADigital/php-exceptions/actions/workflows/ci.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/hradigital/php-exceptions.svg?style=flat-square)](https://packagist.org/packages/hradigital/php-exceptions)
[![PHP Version](https://img.shields.io/packagist/php-v/hradigital/php-exceptions.svg?style=flat-square)](https://packagist.org/packages/hradigital/php-exceptions)
[![License](https://img.shields.io/packagist/l/hradigital/php-exceptions.svg?style=flat-square)](LICENSE)

A curated set of **reusable, semantic domain exceptions** for Domain-Driven Design (DDD) PHP applications.

This package is **framework-agnostic** — zero runtime dependencies beyond the PHP standard library. It was extracted from [`hradigital/php-datatypes`](https://github.com/HRADigital/php-datatypes) so it can evolve independently and be reused across any PHP 8.1+ project.

---

## Why this package?

These are **domain exceptions**, not HTTP exceptions. Their names and intent mirror the HTTP 4XX/5XX status families because the vocabulary is widely understood — but they are meant to be raised in the **domain layer**, outside any transport, and translated to a transport-specific representation (HTTP response, RPC error, CLI exit, queue dead-letter) at the boundary.

Throwing the right exception is part of your domain language. Generic `\InvalidArgumentException` or `\RuntimeException` leak plumbing concerns into the domain. This library gives you:

- **Semantic, intent-revealing exception types** organised into Client (caller-fault, 4XX-aligned) and Server (system-fault, 5XX-aligned) families.
- **A common abstract base** (`AbstractBaseException`) that extends `\DomainException` so a single `catch` can capture everything in this package.
- **No framework lock-in** — pure PHP, drop it into any application or framework.

## Requirements

| Dependency | Version |
| ---------- | ------- |
| PHP        | `^8.1`  |

## Installation

```bash
composer require hradigital/php-exceptions
```

## Usage

Every exception in this package extends `AbstractBaseException`, which itself extends PHP's native `\DomainException`. Each subclass ships with a sensible default message and an HTTP-aligned status code (`$code`).

```php
use HraDigital\Components\Exceptions\Client\NotFoundException;

throw new NotFoundException('User #42 does not exist.');
```

### Catching by intent

```php
use HraDigital\Components\Exceptions\AbstractBaseException;
use HraDigital\Components\Exceptions\Client\ConflictException;
use HraDigital\Components\Exceptions\Client\NotFoundException;
use HraDigital\Components\Exceptions\Client\UnprocessableEntityException;

try {
    $service->updateProfile($payload);
} catch (UnprocessableEntityException $e) {
    // input parsed but failed business-rule validation
} catch (NotFoundException $e) {
    // target aggregate / entity does not exist
} catch (ConflictException $e) {
    // current state of the aggregate refuses this action
} catch (AbstractBaseException $e) {
    // any other domain failure raised by this package
}
```

### Authoring your own exceptions

Pick the closest leaf class and extend it — that way callers can still catch by the broader intent.

```php
use HraDigital\Components\Exceptions\Client\ConflictException;

class EmailAlreadyTakenException extends ConflictException
{
    protected $message = 'The provided email is already in use.';
}
```

## Available exceptions

Listed in HTTP-status order for orientation. Each class carries a docBlock with its semantic meaning, when to extend it, and (where relevant) the browser behaviour the analogous HTTP status triggers.

**Client — caller-fault (4XX-aligned)**
`BadRequestException` (400), `DeniedAccessException` (401), `PaymentRequiredException` (402), `ForbiddenException` (403), `NotFoundException` (404), `MethodNotAllowedException` (405), `NotAcceptableException` (406), `RequestTimeoutException` (408), `ConflictException` (409), `GoneException` (410), `PreconditionFailedException` (412), `UnsupportedMediaTypeException` (415), `RequestedRangeNotSatisfiableException` (416), `ExpectationFailedException` (417), `UnprocessableEntityException` (422), `LockedException` (423), `FailedDependencyException` (424), `TooEarlyException` (425), `PreconditionRequiredException` (428), `TooManyRequestsException` (429), `UnavailableForLegalReasonsException` (451), plus `Request\RequestFailureException` for structured per-field validation failures.

**Server — system-fault (5XX-aligned)**
`InternalServerErrorException` (500), `ServerNotImplementedException` (501), `BadGatewayException` (502), `ServerUnavailableException` (503), `GatewayTimeoutException` (504), `InsufficientStorageException` (507), `LoopDetectedException` (508).

Transport-only HTTP statuses (407, 411, 413, 414, 421, 426, 431, 505, 506, 510, 511) are intentionally not represented — they have no platform-agnostic domain meaning.

## Testing

```bash
composer install
composer test
```

## Continuous Integration

GitHub Actions runs PHPUnit on every push and pull request, across PHP 8.1 / 8.2 / 8.3 / 8.4.

## Versioning

This package follows [Semantic Versioning 2.0.0](https://semver.org/). Breaking changes only ship in major releases.

## Contributing

Pull requests are welcome. For substantial changes, please open an issue first to discuss what you'd like to change. Add tests for any new behaviour or bug fix.

## Security

If you discover a security vulnerability, please email **github@hradigital.com** instead of opening a public issue.

## License

This package is open-sourced software licensed under the [GNU General Public License v3.0 or later](LICENSE).
