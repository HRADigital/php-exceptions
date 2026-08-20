# php-exceptions

[![CI](https://github.com/HRADigital/php-exceptions/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/HRADigital/php-exceptions/actions/workflows/ci.yml)
[![Release](https://img.shields.io/github/v/release/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions/releases)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/hradigital/php-exceptions)](https://packagist.org/packages/hradigital/php-exceptions)
[![Total Downloads](https://img.shields.io/packagist/dt/hradigital/php-exceptions)](https://packagist.org/packages/hradigital/php-exceptions)
[![PHP Version](https://img.shields.io/packagist/php-v/hradigital/php-exceptions)](https://packagist.org/packages/hradigital/php-exceptions)
[![License](https://img.shields.io/github/license/HRADigital/php-exceptions)](LICENSE)
[![Last Commit](https://img.shields.io/github/last-commit/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions/commits/master)
[![Open Issues](https://img.shields.io/github/issues/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions/issues)
[![Contributors](https://img.shields.io/github/contributors/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions/graphs/contributors)
[![Stars](https://img.shields.io/github/stars/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions/stargazers)
[![Code Size](https://img.shields.io/github/languages/code-size/HRADigital/php-exceptions)](https://github.com/HRADigital/php-exceptions)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-FE5196?logo=conventionalcommits&logoColor=white)](https://conventionalcommits.org)

A curated set of **reusable, semantic domain exceptions** for Domain-Driven Design (DDD) PHP applications.

These are domain exceptions, not HTTP exceptions. Their names mirror the HTTP 4XX/5XX families because that vocabulary is widely understood, but they are raised in the **domain layer**, outside any transport, and translated at the boundary into an HTTP response, RPC error, CLI exit or queue dead-letter.

Throwing the right exception is part of your domain language; a generic `\InvalidArgumentException` leaks plumbing into it. The package is framework-agnostic, with zero runtime dependencies beyond the PHP standard library, and works on any PHP 8.1+ project.

- **Client exceptions** - caller-fault types aligned to the 4XX family, from `BadRequestException` through `UnavailableForLegalReasonsException`, each carrying a sensible default message and status code.
- **Server exceptions** - system-fault types aligned to the 5XX family, from `InternalServerErrorException` through `LoopDetectedException`.
- **`AbstractBaseException`** - the common base, extending PHP's native `\DomainException`, so a single `catch` captures everything in this package.
- **`Request\RequestFailureException`** - structured per-field validation failures, for the case where one rejected payload carries many reasons.
- **Extension by intent** - every type is meant to be extended by your own named exception, so callers can still catch the broader intent.
- **No framework lock-in** - pure PHP, dropped into any application or framework.

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

This package is open-sourced software licensed under the [Mozilla Public License 2.0](LICENSE).

You may use this package in closed-source and commercial products. If you modify and
distribute the package's own files, those files must remain under the MPL-2.0.

The `HRADigital` name and package names are not covered by that licence - see
[TRADEMARK.md](TRADEMARK.md).
