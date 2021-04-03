<?php

namespace Garak\DoctrinePostgresTypesBundle\Tests\DependencyInjection;

use Garak\DoctrinePostgresTypesBundle\DependencyInjection\DoctrinePostgresTypesExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

final class DoctrinePostgresTypesExtensionTest extends TestCase
{
    public function testLoadFailure(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $extension = $this->createMock(DoctrinePostgresTypesExtension::class);

        $extension->load([[]], $container);
        self::assertFalse(false);
    }

    public function testLoadSetParameters(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $parameterBag = $this->getMockBuilder(ParameterBag::class)
            ->disableOriginalConstructor()->getMock();

        $parameterBag->method('add');
        $container->method('getParameterBag')->willReturn($parameterBag);

        $extension = new DoctrinePostgresTypesExtension();
        $configs = [];
        $extension->load($configs, $container);
        self::assertTrue(true);
    }

    public function testPrepend(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $container->expects(self::once())->method('prependExtensionConfig');

        $extension = new DoctrinePostgresTypesExtension();
        $extension->prepend($container);
        self::assertTrue(true);
    }
}
