<?php


namespace GGGGino\RecentyBundle\DependencyInjection\Compiler;

use GGGGino\RecentyBundle\WrapperManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class StrategyPass
 * @package GGGGino\RecentyBundle\DependencyInjection\Compiler
 */
class StrategyPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(WrapperManager::class)) { return; }

        $definition = $container->findDefinition(WrapperManager::class);

        if ($clients = $container->getParameter('ggggino.recenty.clients')) {
            foreach ($clients as $idClient => $client) {
                // add the transport service to the TransportChain service
                $definition->addMethodCall('addStrategy', [$idClient, new Reference($client['class'])]);
            }
        }
    }
}