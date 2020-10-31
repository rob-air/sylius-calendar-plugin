<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Factory;

use RobAir\SyliusCalendarPlugin\Entity\Attendant;
use RobAir\SyliusCalendarPlugin\Entity\Booking;
use RobAir\SyliusCalendarPlugin\Entity\Calendar;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class AttendantFactory implements FactoryInterface
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
     * @return Attendant
     */
    public function createNewWithDefaultCalendar(Calendar $calendar)
    {
        $attendant = $this->createNew();

        $attendant->setDefaultCalendar($calendar);

        return $attendant;
    }

}
