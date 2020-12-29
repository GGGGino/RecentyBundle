<?php

namespace GGGGino\RecentyBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use GGGGino\RecentyBundle\DependencyInjection\Compiler\StrategyPass;
use GGGGino\RecentyBundle\DependencyInjection\GGGGinoRecentyExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class GGGGinoRecentyBundle
 * @package GGGGino\RecentyBundle
 */
class GGGGinoRecentyBundle extends Bundle
{
    /**
     * @inheritDoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $this->addRegisterMappingsPass($container);

        $container->addCompilerPass(new StrategyPass());
    }

    /**
     * @param ContainerBuilder $container
     */
    private function addRegisterMappingsPass(ContainerBuilder $container)
    {
        $mappings = [
            realpath(__DIR__.'/Resources/config/doctrine-mapping') => 'GGGGino\RecentyBundle\Model',
        ];

        if (class_exists('Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass')) {
            $container->addCompilerPass(DoctrineOrmMappingsPass::createXmlMappingDriver($mappings));
        }
    }

    /**
     * @inheritdoc
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new GGGGinoRecentyExtension();
        }
        return $this->extension;
    }
}
