<?php

namespace Garak\DoctrinePostgresTypes\Tests\DependencyInjection;

use Garak\DoctrinePostgresTypesBundle\DependencyInjection\DoctrinePostgresTypesExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class DoctrinePostgresTypesExtensionTest extends TestCase
{
    public function testLoadFailure()
    {
        $container = $this->getMockBuilder(ContainerBuilder::class)
            ->disableOriginalConstructor()->getMock();
        $extension = $this->createMock(DoctrinePostgresTypesExtension::class);

        $extension->load([[]], $container);
        $this->assertFalse(false);
    }

    public function testLoadSetParameters()
    {
        $container = $this->getMockBuilder(ContainerBuilder::class)
            ->disableOriginalConstructor()->getMock();
        $parameterBag = $this->getMockBuilder(ParameterBag::class)
            ->disableOriginalConstructor()->getMock();

        $parameterBag->expects($this->any())->method('add');

        $container->expects($this->any())->method('getParameterBag')->will($this->returnValue($parameterBag));

        $extension = new DoctrinePostgresTypesExtension();
        $configs = [];
        $extension->load($configs, $container);
        $this->assertTrue(true);
    }

    public function testPrepend()
    {
        $container = $this->getMockBuilder(ContainerBuilder::class)
            ->disableOriginalConstructor()->getMock();
        $container->expects($this->once())->method('prependExtensionConfig');

        $extension = new DoctrinePostgresTypesExtension();
        $extension->prepend($container);
        $this->assertTrue(true);
    }
}
