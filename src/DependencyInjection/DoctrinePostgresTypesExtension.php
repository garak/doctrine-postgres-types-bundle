<?php

namespace Garak\DoctrinePostgresTypesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * DoctrinePostgresTypesExtension.
 */
class DoctrinePostgresTypesExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $config = array(
            'dbal' => array('types' => array(
                'text_array' => 'Doctrine\DBAL\PostgresTypes\TextArrayType',
                'int_array' => 'Doctrine\DBAL\PostgresTypes\IntArrayType',
                'tsvector' => 'Doctrine\DBAL\PostgresTypes\TsvectorType',
                'tsquery' => 'Doctrine\DBAL\PostgresTypes\TsqueryType',
                'xml' => 'Doctrine\DBAL\PostgresTypes\XmlType',
                'inet' => 'Doctrine\DBAL\PostgresTypes\InetType',
            )),
        );
        $container->prependExtensionConfig('doctrine', $config);
    }
}
