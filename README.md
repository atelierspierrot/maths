Maths
=====

[![documentation](http://img.ateliers-pierrot-static.fr/readthe-doc.png)](http://docs.ateliers-pierrot.fr/maths/)
Some PHP classes to do mathematics


## Usage

### First notes about standards

As for all our work, we try to follow the coding standards and naming rules most commonly in use:

-   the [PEAR coding standards](http://pear.php.net/manual/en/standards.php)
-   the [PHP Framework Interoperability Group standards](http://github.com/php-fig/fig-standards).

Knowing that, all classes are named and organized in an architecture to allow the use of the
[standard SplClassLoader](http://gist.github.com/jwage/221634).

The whole package is embedded in the `Maths` namespace.

In this README documentation, the key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT",
"SHOULD", "SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL" in this document are to be
interpreted as described in [RFC 2119](http://www.ietf.org/rfc/rfc2119.txt).

### Installation

You can use this package in your work in many ways. Note that it depends on the external
packages [Library](http://github.com/atelierspierrot/library) and
[PHP Patterns](http://github.com/atelierspierrot/patterns).

First, you can clone the [GitHub](http://github.com/atelierspierrot/maths) repository
and include it "as is" in your poject:

    http://github.com/atelierspierrot/patterns
    http://github.com/atelierspierrot/library
    http://github.com/atelierspierrot/maths

You can also download an [archive](http://github.com/atelierspierrot/maths/downloads)
from Github.

Then, to use the package classes, you just need to register the `Maths` AND the `Library` and
`Patterns` namespaces directories using the [SplClassLoader](http://gist.github.com/jwage/221634) or
any other custom autoloader (if required, a copy of the `SplClassLoader` is proposed in
the package):

```php
require_once '.../src/SplClassLoader.php';
$patternsLoader = new SplClassLoader('Patterns', '/path/to/patterns/package/src');
$patternsLoader->register();
$libraryLoader = new SplClassLoader('Library', '/path/to/library/package/src');
$libraryLoader->register();
$mathsLoader = new SplClassLoader('Maths', '/path/to/package/src');
$mathsLoader->register();
```

If you are a [Composer](http://getcomposer.org/) user, just add the package to your requirements
in your `composer.json`:

```json
"require": {
    "your/deps": "*",
    "atelierspierrot/maths": "dev-master"
}
```

The namespaces will be automatically added to the project Composer autoloader.


## Development

To install all PHP packages for development, just run:

    ~$ composer install --dev

A documentation can be generated with [Sami](http://github.com/fabpot/Sami) running:

    ~$ php vendor/sami/sami/sami.php render sami.config.php

The latest version of this documentation is available online at <http://docs.ateliers-pierrot.fr/maths/>.


## Author & License

>    Maths - Some PHP classes to do mathematics

>    http://github.com/atelierspierrot/maths

>    Copyright (c) 2014-2015, Pierre Cassat and contributors

>    Licensed under the Apache Version 2.0 license.

>    http://www.apache.org/licenses/LICENSE-2.0

>    ----

>    Les Ateliers Pierrot - Paris, France

>    <http://www.ateliers-pierrot.fr/> - <contact@ateliers-pierrot.fr>
