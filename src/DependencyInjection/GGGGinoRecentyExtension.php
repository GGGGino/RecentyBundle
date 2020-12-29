<?php

namespace GGGGino\RecentyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Class GGGGinoRecentyExtension
 * @package GGGGino\RecentyBundle\DependencyInjection
 */
class GGGGinoRecentyExtension extends Extension
{
    public function load(array $mergedConfig, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $mergedConfig);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.xml');

        $container->setParameter('ggggino.recenty.clients', $config['clients']);
    }

    /**
     * @inheritdoc
     */
    public function getAlias()
    {
        return 'ggggino_recenty';
    }
}
