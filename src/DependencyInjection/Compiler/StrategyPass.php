<?php


namespace GGGGino\RecentyBundle\DependencyInjection\Compiler;

use GGGGino\RecentyBundle\WrapperManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class StrategyPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(WrapperManager::class)) { return; }

        $definition = $container->findDefinition(WrapperManager::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('ggggino_skuskucart.request_verifier');

        if ($container->getParameter('myService') == true) {
            // here add every config strategy to the wrapperManager
            die('return right');
        }

        foreach ($taggedServices as $id => $tags) {
            // add the transport service to the TransportChain service
            $definition->addMethodCall('addStrategy', [new Reference($id)]);
        }
    }
}