<?php

namespace Garak\DoctrinePostgresTypesBundle\DependencyInjection;

use Doctrine\DBAL\PostgresTypes\InetType;
use Doctrine\DBAL\PostgresTypes\IntArrayType;
use Doctrine\DBAL\PostgresTypes\TextArrayType;
use Doctrine\DBAL\PostgresTypes\TsqueryType;
use Doctrine\DBAL\PostgresTypes\TsvectorType;
use Doctrine\DBAL\PostgresTypes\XmlType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class DoctrinePostgresTypesExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
    }

    public function prepend(ContainerBuilder $container): void
    {
        $config = [
            'dbal' => ['types' => [
                'text_array' => TextArrayType::class,
                'int_array' => IntArrayType::class,
                'tsvector' => TsvectorType::class,
                'tsquery' => TsqueryType::class,
                'xml' => XmlType::class,
                'inet' => InetType::class,
            ]],
        ];
        $container->prependExtensionConfig('doctrine', $config);
    }
}
