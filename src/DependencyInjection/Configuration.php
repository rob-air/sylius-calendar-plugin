<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('rob_air_sylius_calendar_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
