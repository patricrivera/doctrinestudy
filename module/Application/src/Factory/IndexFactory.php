<?php

namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;

class IndexFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // get your dependency
        $doctrine = $container->get(\Doctrine\ORM\EntityManager::class);

        // inject it int the constructor
        return new IndexController($doctrine);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $doctrine = $serviceLocator->get(\Doctrine\ORM\EntityManager::class);
        return new IndexController($doctrine);
    }
}