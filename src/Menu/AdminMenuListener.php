<?php

namespace RobAir\SyliusCalendarPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('rob_air_sylius_calendar_plugin')
            ->setLabel('rob_air_sylius_calendar_plugin.menu.admin.item')
        ;

        $newSubmenu
            ->addChild('calendars')
            ->setLabel('rob_air_sylius_calendar_plugin.menu.admin.calendar.header')
            ->setUri('/admin/calendars')
            ->setLabelAttribute('icon', 'calendar outline')
            ->setName('rob_air_sylius_calendar_plugin.menu.admin.calendar.header')
        ;

        $newSubmenu
            ->addChild('bookings')
            ->setLabel('rob_air_sylius_calendar_plugin.menu.admin.booking.header')
            ->setUri('/admin/bookings')
            ->setLabelAttribute('icon', 'calendar alternate outline')
        ;

        $newSubmenu
            ->addChild('attendants')
            ->setLabel('rob_air_sylius_calendar_plugin.menu.admin.attendant.header')
            ->setUri('/admin/attendants')
            ->setLabelAttribute('icon', 'users')
        ;
    }
}
