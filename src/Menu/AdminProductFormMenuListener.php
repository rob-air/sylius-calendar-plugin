<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Menu;

use RobAir\SyliusCalendarPlugin\Entity\ProductInterface;
use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

final class AdminProductFormMenuListener
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        /** @var ProductInterface $product */
        $product = $event->getProduct();

        if (!$product->hasBooking()) {
            return;
        }

        $menu = $event->getMenu();

        $menu
            ->addChild('booking')
            ->setAttribute('template', '@RobAirSyliusCalendarPlugin/Admin/Form/_booking.html.twig')
            ->setLabel('rob_air_sylius_calendar_plugin.ui.booking')
        ;
    }
}
