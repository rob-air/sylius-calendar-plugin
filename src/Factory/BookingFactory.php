<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Factory;

use RobAir\SyliusCalendarPlugin\Entity\Booking;
use RobAir\SyliusCalendarPlugin\Entity\Calendar;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class BookingFactory implements FactoryInterface
{
    /**
     * @var string
     * @psalm-var class-string
     */
    private $className;

    /**
     * @psalm-param class-string $className
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        return new $this->className();
    }


    /**
     * @param Calendar $calendar
     * @return Booking
     */
    public function createNewWithCalendar(Calendar $calendar)
    {
        $booking = $this->createNew();

        $booking->setCalendar($calendar);

        return $booking;
    }
}
