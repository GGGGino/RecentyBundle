<?php

namespace GGGGino\RecentyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package GGGGino\RecentyBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ggggino_recenty');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('ggggino_recenty');
        }

        $rootNode
            ->children()
                ->arrayNode('clients')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('class')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}