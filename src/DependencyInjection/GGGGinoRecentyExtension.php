<?php

namespace GGGGino\RecentyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class GGGGinoRecentyExtension extends Extension
{
    public function load(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.xml');


        $container->setParameter('myService', true);
    }

    /**
     * @inheritdoc
     */
    public function getAlias()
    {
        return 'ggggino_recenty';
    }
}
