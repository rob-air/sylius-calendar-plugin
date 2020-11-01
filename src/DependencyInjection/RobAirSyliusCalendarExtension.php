<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class RobAirSyliusCalendarExtension extends Extension
{
    public function load(array $config, ContainerBuilder $container): void
    {
    }

}
