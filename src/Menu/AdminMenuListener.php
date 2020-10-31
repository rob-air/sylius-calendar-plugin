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
            ->addChild('booking')
            ->setLabel('Bookings')
            ->setUri('/admin/bookings')
        ;

        $newSubmenu
            ->addChild('calendar')
            ->setLabel('Calendars')
            ->setUri('/admin/calendars')
        ;

        $newSubmenu
            ->addChild('attendant')
            ->setLabel('Attendants')
            ->setUri('/admin/attendants')
        ;
    }
}
