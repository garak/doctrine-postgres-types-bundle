Doctrine Postgres Type Bundle
=============================

## Installation

Run from terminal:

```bash
$ composer require garak/doctrine-postgres-types-bundle
```

Enable bundle in the kernel:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Garak\DoctrinePostgresTypesBundle\DoctrinePostgresTypesBundle(),
    );
}
```
