# PHP conventions

This development tool provides a pre-defined configuration for [GrumPHP](https://github.com/phpro/grumphp) with the
following checks enabled:

* Security Checker ([sensiolabs/security-checker](https://packagist.org/packages/sensiolabs/security-checker)),
* composer.json validation,
* composer.json normalization ([ergebnis/composer-normalize](https://packagist.org/packages/ergebnis/composer-normalize)),
* YAML Lint,
* JSON Lint,
* PHP Lint ([php-parallel-lint/php-parallel-lint](https://packagist.org/packages/php-parallel-lint/php-parallel-lint)),
* [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) checks and fixes ([PSR12 or some other custom ones](https://packagist.org/packages/agora/phpcsfixer-configs-php)),
* PHP Stan ([PHPStan](https://packagist.org/packages/phpstan/phpstan))

The package provides a default configuration for each task, and it's customizable at will through a simple configuration
file.

The package will install the required dependencies, so it works out of the box.

Tasks can be also added or skipped according to your need.

The following versions of PHP are supported:

* PHP 7.2

## Installation

```shell
composer require agora/php-conventions --dev
```

### If you're not using GrumPHP

Manually add to your `composer.json` file

```yaml
    "extra": {
        "grumphp": {
            "config-default-path": "vendor/agora/php-conventions/config/grumphp.yml"
        }
    }
```

### If you're using GrumPHP already

Edit the file `grumphp.yml.dist` or `grumphp.yml` and add on the top it:

```yaml
imports:
  - { resource: vendor/agora/php-conventions/config/grumphp.yaml }
```

To add an extra Grumphp task:

```yaml
imports:
  - { resource: vendor/agora/php-conventions/config/grumphp.yaml }

parameters:
  extra_tasks:
    infection: ~
  skip_tasks:
    - phpcsfixer
```

In conjunction with `extra_tasks`, use `skip_tasks` to skip tasks if needed.