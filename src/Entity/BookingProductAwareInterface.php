<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Entity;

interface BookingProductAwareInterface
{
    public function isBookingProduct(): bool;

    public function setBooking(BookingProductInterface $booking): void;

    public function getBooking(): BookingProductInterface;

}
