<?php

namespace RobAir\SyliusCalendarPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('Calendar & Booking')
        ;

        $newSubmenu
            ->addChild('new-subitem')
            ->setLabel('booking')
            ->setUri('/admin/booking')
        ;
    }
}
