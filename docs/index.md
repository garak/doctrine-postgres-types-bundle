Doctrine Postgres Type Bundle
=============================

## Installation

Run from terminal:

```bash
composer require garak/doctrine-postgres-types-bundle
```

Unless you're using Flex, enable bundle in the kernel:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = 
        // ...
        new Garak\DoctrinePostgresTypesBundle\DoctrinePostgresTypesBundle(),
    ];
}
```
