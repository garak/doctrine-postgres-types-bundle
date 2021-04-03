<?php

namespace Garak\DoctrinePostgresTypesBundle\Tests;

use Garak\DoctrinePostgresTypesBundle\DoctrinePostgresTypesBundle;
use PHPUnit\Framework\TestCase;

final class DoctrinePostgresTypesBundleTest extends TestCase
{
    public function testConstruct(): void
    {
        $bundle = new DoctrinePostgresTypesBundle();
        self::assertInstanceOf(DoctrinePostgresTypesBundle::class, $bundle);
    }
}
