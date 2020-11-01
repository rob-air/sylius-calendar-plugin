<?php

declare(strict_types=1);

namespace RobAir\SyliusCalendarPlugin\Entity;

trait BookingProductAwareTrait
{
    /**
     * @var BookingProductInterface;
     */
    protected $booking;

    public function setBooking(BookingProductInterface $booking): void
    {
        $this->booking = $booking;
    }

    public function getBooking(): BookingProductInterface
    {
        return $this->booking;
    }

    public function hasBooking(): bool
    {
        return null !== $this->booking;
    }


}
